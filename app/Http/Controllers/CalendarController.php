<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Menu;

class CalendarController extends Controller
{
    public function calendar(){
      $date = Carbon::now()->format('y-m-d');

      $breakfasts = Menu::where('menu_cat.menuCatName', 'breakfast')
              ->where('menuDate', $date)
              ->leftJoin('menu_cat', 'menus.menu_cat_id', '=', 'menu_cat.menu_cat_id')
              ->select('menus.*', 'menu_cat.menu_cat_id', 'menu_cat.menuCatName')
              ->get();

      // date_default_timezone_set('Asia/Hong_Kong');

      $year = (isset($_GET['year'])) ? $_GET['year'] : date("Y");
      $week = (isset($_GET['week'])) ? $_GET['week'] : date('W');
      if($week > 52) {
          $year++;
          $week = 1;
      } elseif($week < 1) {
          $year--;
          $week = 52;
      }

      return view('my-calendar', [
        'year' => $year,
        'week' => $week,
        'date' => $date,
        'breakfasts' => $breakfasts
      ]);
    }
}
