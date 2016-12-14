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
      $tomorrow = Carbon::tomorrow()->format('y-m-d');

      $tmrw = Carbon::tomorrow();
      $tmrrw = $tmrw->toFormattedDateString();

      $breakfastsTmrw = Menu::where('menu_cat.menuCatName', 'breakfast')
              ->where('menuDate', $tomorrow)
              ->leftJoin('menu_cat', 'menus.menu_cat_id', '=', 'menu_cat.menu_cat_id')
              ->select('menus.*', 'menu_cat.menu_cat_id', 'menu_cat.menuCatName')
              ->get();

      $dinnersTmrw = Menu::where('menu_cat.menuCatName', 'dinner')
              ->where('menuDate', $tomorrow)
              ->leftJoin('menu_cat', 'menus.menu_cat_id', '=', 'menu_cat.menu_cat_id')
              ->select('menus.*', 'menu_cat.menu_cat_id', 'menu_cat.menuCatName')
              ->get();

      $yesterday = Carbon::yesterday();
      $ystrdy = $yesterday->toFormattedDateString();

      $dt = Carbon::now('Asia/Hong_Kong');
      $dateString = $dt->toFormattedDateString();
      $timeString = $dt->toTimeString();

      $ttmrw = Carbon::tomorrow('Asia/Hong_Kong');
      $timetomorrow = $ttmrw->toTimeString();

      $guest_id = Sentinel::getUser()->id;

      $transactionsBreakfast = Transaction::where('guests_id', $guest_id)
              ->where('transDate', $date)
              ->where('transCat', 'breakfast')
              ->get();

      $transactionsBreakfastTmrw = Transaction::where('guests_id', $guest_id)
              ->where('transDate', $tomorrow)
              ->where('transCat', 'breakfast')
              ->get();
      $transactionsDinner = Transaction::where('guests_id', $guest_id)
              ->where('transDate', $date)
              ->where('transCat', 'dinner')
              ->get();
      $transactionsDinnerTmrw = Transaction::where('guests_id', $guest_id)
              ->where('transDate', $tomorrow)
              ->where('transCat', 'dinner')
              ->get();
      $transactions = Transaction::where('guests_id', $guest_id)
              ->leftJoin('menus', 'transactions.menus_id', '=', 'menus.id')
              ->select('transactions.*', 'menus.id', 'menus.menuPrice')
              ->get();

      return view('guests.index', [
        'date' => $date,
        'dateString' => $dateString,
        'tomorrow' => $tomorrow,
        'timeString' => $timeString,
        'breakfasts' => $breakfasts,
        'dinners' => $dinners,
        'breakfastsTmrw' => $breakfastsTmrw,
        'dinnersTmrw' => $dinnersTmrw,
        'guest_id' => $guest_id,
        'transactionsBreakfast' => $transactionsBreakfast,
        'transactionsBreakfastTmrw' => $transactionsBreakfastTmrw,
        'transactionsDinner' => $transactionsDinner,
        'transactionsDinnerTmrw' => $transactionsDinnerTmrw,
        'tmrrw' => $tmrrw,
        'transactions' => $transactions,
        'timetomorrow' => $timetomorrow
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBreakfast(Request $request)
    {
      // validation
       $this->validate($request,[
         'guests_id' => 'required',
         'menus_id' => 'required',
         'transCat' => 'required|min:6',
         'transDescription' => 'required',
         'transDate' => 'required|date'
      ]);
       // create new data
       $transaction = new transaction;
       $transaction->guests_id = $request->guests_id;
       $transaction->menus_id = $request->menus_id;
       $transaction->transCat = $request->transCat;
       $transaction->transDescription = $request->transDescription;
       $transaction->transDate = $request->transDate;
       $transaction->save();
       return redirect()->route('guests.index')->with('alert-success-breakfast','Order Data Saved!');
    }

    public function storeBreakfastTmrw(Request $request)
    {
      // validation
       $this->validate($request,[
         'guests_id' => 'required',
         'menus_id' => 'required',
         'transCat' => 'required|min:6',
         'transDescription' => 'required',
         'transDate' => 'required|date'
      ]);
       // create new data
       $transaction = new transaction;
       $transaction->guests_id = $request->guests_id;
       $transaction->menus_id = $request->menus_id;
       $transaction->transCat = $request->transCat;
       $transaction->transDescription = $request->transDescription;
       $transaction->transDate = $request->transDate;
       $transaction->save();
       return redirect()->route('guests.index')->with('alert-success-breakfastTmrw','Order Data Saved!');
    }

    public function storeDinner(Request $request)
    {
      // validation
       $this->validate($request,[
         'guests_id' => 'required',
         'menus_id' => 'required',
         'transCat' => 'required|min:6',
         'transDescription' => 'required',
         'transDate' => 'required|date'
      ]);
       // create new data
       $transaction = new transaction;
       $transaction->guests_id = $request->guests_id;
       $transaction->menus_id = $request->menus_id;
       $transaction->transCat = $request->transCat;
       $transaction->transDescription = $request->transDescription;
       $transaction->transDate = $request->transDate;
       $transaction->save();
       return redirect()->route('guests.index')->with('alert-success-dinner','Order Data Saved!');
    }

    public function storeDinnerTmrw(Request $request)
    {
      // validation
       $this->validate($request,[
         'guests_id' => 'required',
         'menus_id' => 'required',
         'transCat' => 'required|min:6',
         'transDescription' => 'required',
         'transDate' => 'required|date'
      ]);
       // create new data
       $transaction = new transaction;
       $transaction->guests_id = $request->guests_id;
       $transaction->menus_id = $request->menus_id;
       $transaction->transCat = $request->transCat;
       $transaction->transDescription = $request->transDescription;
       $transaction->transDate = $request->transDate;
       $transaction->save();
       return redirect()->route('guests.index')->with('alert-success-dinnerTmrw','Order Data Saved!');
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
      // delete data
      $transactions = Transaction::findOrFail($id);
      $transactions->delete();
      return redirect()->route('guests.index')->with('alert-delete','Your menu order has been cancelled!');
    }

    public function myAccount()
    {

    }

}
