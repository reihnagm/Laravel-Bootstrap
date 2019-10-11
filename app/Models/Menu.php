<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Model\Role;

class Menu extends Model
{
  protected $guarded = ['id'];

  public function childs()
  {
    return $this->hasMany('App\Models\Menu', 'parent', 'id');
  }

  public static function getMenus()
  {
    $menuLists = [];
    $topMenu = self::where('parent', 0)->oldest('order')->get();
    foreach ($topMenu as $key => $val) {
        $menuLists[$key]['id'] = $val['id'];
        $menuLists[$key]['title'] = $val['title'];
        $menuLists[$key]['icon'] = $val['icon'];
        $menuLists[$key]['classname'] = $val['classname'];
        $menuLists[$key]['url'] = $top['url'];
        $menuLists[$key]['items'] = self::getChildMenus($val['id']);
    }
    return $menuLists;
  }

  public static function getChildMenus($menuId)
  {
    $menuLists = [];
    $menus = self::where('parent', $menuId)->oldest('order')->get();
    foreach ($menus as $key => $menu) {
        $menuLists[$key]['id'] = $val['id'];
        $menuLists[$key]['title'] = $val['title'];
        $menuLists[$key]['icon'] = $val['icon'];
        $menuLists[$key]['class'] = $val['classname'];
        $menuLists[$key]['url'] = $val['url'];
        $child = self::where('parent', $val['id'])->get();
        if (count($child) > 0) {
            $menuLists[$key]['items'] = self::getChildMenus($val['id']);
        }
    }
    return $menuLists;
  }

  public static function getRoledMenus()
  {
    $menuLists = [];
    $groupMenus = Role::select('menu_id')->where('group_id', auth()->user()->group_id)->get();
    $menus = array();
    foreach ($groupMenus as $menu) {
        $menus[] = $menu['menu_id'];
    }
    $topMenus = self::whereIn('id', $menus)->where('parent', 0)->oldest('order')->get();
    foreach ($topMenus as $key => $val) {
        $menuLists[$key]['id'] = $val['id'];
        $menuLists[$key]['title'] = $val['title'];
        $menuLists[$key]['icon'] = $val['icon'];
        $menuLists[$key]['class'] = $val['classname'];
        $menuLists[$key]['url'] = $val['url'];
        $menuLists[$key]['items'] = self::getChildRoledMenus($val['id'], $groupMenus);
    }
    return $menuLists;
  }

  public static function getChildRoledMenus($menuId, $lists)
  {
    $menuLists = [];
    $menus = self::where('parent', $menuId)->whereIn('id', $lists)->oldest('order')->get();
    foreach ($menus as $key => $val) {
        $menuLists[$key]['id'] = $val['id'];
        $menuLists[$key]['title'] = $val['title'];
        $menuLists[$key]['icon'] = $val['icon'];
        $menuLists[$key]['class'] = $val['classname'];
        $menuLists[$key]['url'] = $val['url'];

        $child = self::where('parent', $menu['id'])->get();
        if (count($child) > 0) {
            $menuLists[$key]['items'] = self::getChildMenus($menu['id'], $lists);
        }
    }
    return $menuLists;
  }
}
