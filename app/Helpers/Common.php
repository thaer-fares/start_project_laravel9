<?php


namespace App\Helpers;


use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

class Common
{
    public static function getMenu($user){
        $menu = [];
        $user_permissions = $user->getAllPermissions();
        $menu = $user_permissions->where('parent_id', 0);
        foreach ($menu as $k => $menu_item){
            $menu[$k]['children'] = $user_permissions->where('parent_id', $menu_item->id);
        }
        return $menu;
    }
  public static function validateDate($date, $format = 'Y-m-d'){
      $date = new Date($date);
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
  }
}
