<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Roles;
use App\Users;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //Display registered guests
      $users = Users::where('roles_id', '2')
              ->orderBy('last_name', 'asc')
              ->get();

      return view('admin.index',
        ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // create user is in RegistrationController
      //on function store
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
       $user = Users::findOrFail($id);
       // return to the edit views
       return view('admin.edit',compact('user'));
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
         'first_name'=> 'required',
         'last_name' => 'required',
         'roomNum' => 'required',
         'checkIn' => 'required',
         'checkOut' => 'required',
      ]);

      $user = Users::findOrFail($id);
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->roomNum = $request->roomNum;
      $user->checkIn = $request->checkIn;
      $user->checkOut = $request->checkOut;
      $user->save();

      return redirect()->route('admin.index')->with('alert-success','Guest data updated and saved!');
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
      $user = Users::findOrFail($id);
      $user->delete();
      return redirect()->route('admin.index')->with('alert-success','Guest data deleted!');
    }

    // public function registeredGuests(){
    //   $users = Users::where('roles_id', '2')
    //           ->orderBy('last_name', 'asc')
    //           ->get();
    //
    //   return view('admin.registered-guests',
    //     ['users' => $users]
    //   );
    //
    // }

}
