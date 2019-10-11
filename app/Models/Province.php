<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $guarded = [
      'id'
    ];

    public $timestamps = false;

    public function regency()
    {
      return $this->hasMany('App\Models\Regency');
    }

    public function disricts()
    {
      return $this->hasManyThrough('App\Models\Regency', 'App\Models\District');
    }

    public function villages()
    {
      return $this->hasManyThrough('App\Models\Regency', 'App\Models\District', 'App\Models\Village');
    }
}
