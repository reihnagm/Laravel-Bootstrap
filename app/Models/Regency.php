<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $guarded = [
    'id'
  ];

    public $timestamps = false;

    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }

    public function districts()
    {
        return $this->hasMany('App\Models\District');
    }

    public function villages()
    {
        return $this->hasManyThrough('App\Models\District', 'App\Models\Village');
    }
}
