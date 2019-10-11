<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function regency()
    {
        return $this->belongsTo('App\Models\Regency');
    }

    public function province()
    {
      return $this->belongsTo('App\Models\Province');
    }

  public function villages()
    {
    return $this->hasMany('App\Models\Village');
    }
}
