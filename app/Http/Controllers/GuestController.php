<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use Carbon\Carbon;
use App\Menu;
use App\Users;
use App\Transaction;
use Sentinel;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('guests.todays-menu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $date = Carbon::now()->format('y-m-d');

      $breakfasts = Menu::where('menu_cat.menuCatName', 'breakfast')
              ->where('menuDate', $date)
              ->leftJoin('menu_cat', 'menus.menu_cat_id', '=', 'menu_cat.menu_cat_id')
              ->select('menus.*', 'menu_cat.menu_cat_id', 'menu_cat.menuCatName')
              ->get();

      $dinners = Menu::where('menu_cat.menuCatName', 'dinner')
              ->where('menuDate', $date)
              ->leftJoin('menu_cat', 'menus.menu_cat_id', '=', 'menu_cat.menu_cat_id')
              ->select('menus.*', 'menu_cat.menu_cat_id', 'menu_cat.menuCatName')
              ->get();

      // Query Breakfast Menu for tomorrow
      $tmrw = Carbon::tomorrow();
      $tomorrow = $tmrw->toFormattedDateString();

      $breakfastsTmrw = Menu::where('menu_cat.menuCatName', 'breakfast')
              ->where('menuDate', $tmrw)
              ->leftJoin('menu_cat', 'menus.menu_cat_id', '=', 'menu_cat.menu_cat_id')
              ->select('menus.*', 'menu_cat.menu_cat_id', 'menu_cat.menuCatName')
              ->get();

      $dinnerTmrw = Menu::where('menu_cat.menuCatName', 'dinner')
              ->where('menuDate', $tmrw)
              ->leftJoin('menu_cat', 'menus.menu_cat_id', '=', 'menu_cat.menu_cat_id')
              ->select('menus.*', 'menu_cat.menu_cat_id', 'menu_cat.menuCatName')
              ->get();


      $yesterday = Carbon::yesterday();
      $ystrdy = $yesterday->toFormattedDateString();


      $dt = Carbon::now();
      $dateString = $dt->toFormattedDateString();
      $timeString = $dt->toTimeString();





      return view('guests.todays-menu', [
        'date' => $date,
        'dateString' => $dateString,
        'tomorrow' => $tomorrow,
        'timeString' => $timeString,
        'breakfasts' => $breakfasts,
        'dinners' => $dinners,
        'breakfastsTomorrow' => $breakfastsTmrw,
        'dinnersTomorrow' => $dinnerTmrw,
      ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validation
       $this->validate($request,[
         'guests_id' => 'required',
         'menus_id' => 'required',
         'transDescription' => 'required|min:6',
         'transDate' => 'required|date',
      ]);
       // create new data
       $transaction = new transaction;
       $transaction->guests_id = $request->guests_id;
       $transaction->menus_id = $request->menus_id;
       $transaction->transDescription = $request->transDescription;
       $transaction->transDate = $request->transDate;
       $transaction->save();
       return redirect()->route('guests.todays-menu')->with('alert-success','Order Data Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function todaysMenu()
    // {
    //   return view('guests.todays-menu');
    // }

    public function myAccount()
    {
      return view('guests.my-account');
    }

}
