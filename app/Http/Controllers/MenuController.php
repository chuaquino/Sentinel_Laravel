<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $menus = Menu::leftJoin('menu_cat', 'menus.menu_cat_id', '=', 'menu_cat.menu_cat_id')
              ->select('menus.*', 'menu_cat.menu_cat_id', 'menu_cat.menuCatName')
              ->get();

      // $menus = Menu::all();

      return view('menu.index',['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
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
       'menuName'=> 'required|min:6',
       'menuDesc' => 'required|min:6',
       'menuPrice' => 'required',
       'menuDate' => 'required',
       'menu_cat_id' => 'required',
        ]);

       $menu = new menu;
       $menu->menuName = $request->menuName;
       $menu->menuDesc = $request->menuDesc;
       $menu->menuPrice = $request->menuPrice;
       $menu->menuDate = $request->menuDate;
       $menu->menu_cat_id = $request->menu_cat_id;
       $menu->save();

      return redirect()->route('menu.index')->with('alert-success','Menu data saved!');

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
      $menu = Menu::findOrFail($id);
      // return to the edit views
      return view('menu.edit',compact('menu'));
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
      // validation
     $this->validate($request,[
       'menuName'=> 'required',
       'menuDesc' => 'required',
       'menuPrice' => 'required',
       'menuDate' => 'required',
     ]);

     $menu = Menu::findOrFail($id);
     $menu->menuName = $request->menuName;
     $menu->menuDesc = $request->menuDesc;
     $menu->menuPrice = $request->menuPrice;
     $menu->menuDate = $request->menuDate;
     $menu->save();

     return redirect()->route('menu.index')->with('alert-success','Menu data saved!');
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
      $menu = Menu::findOrFail($id);
      $menu->delete();
      return redirect()->route('menu.index')->with('alert-success','Menu deleted!');
    }
}
