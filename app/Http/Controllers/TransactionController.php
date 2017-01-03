<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;

class TransactionController extends Controller
{
    public function index()
    {
      $guests = Users::all();

      date_default_timezone_set('Asia/Hong_Kong');
      $year = (isset($_GET['year'])) ? $_GET['year'] : date("Y");
      $week = (isset($_GET['week'])) ? $_GET['week'] : date('W');
      $month = (isset($_GET['month'])) ? $_GET['month'] : date('m');
      $date = (isset($_GET['date'])) ? $_GET['date'] : date('j');

      if($month > 12) {
          $year++;
          $month = 1;
      } elseif($month < 1) {
          $year--;
          $month = 12;
      }

      return view('transactions.index', [
        'guests' => $guests,
        'year' => $year,
        'week' => $week,
        'month' => $month,
        'date' => $date
      ]);
    }
}
