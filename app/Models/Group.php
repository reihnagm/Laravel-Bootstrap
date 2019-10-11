<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = ['id'];

    public static function groupList()
    {
        $groups = self::where('id', '<>', auth()->user()->group_id)->latest('id')->get();

        $list = [];

        foreach ($groups as $group) {
            $list[$group->id] = $group->name;
        }
        return $list;
    }
}
