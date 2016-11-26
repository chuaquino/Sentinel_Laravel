@extends('layouts.app')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Update Guest Info</h1>
    </div>
  </div>
  <div class="row">
    <form class="" action="{{route('admin.update',$user->id)}}" method="post">
      <input name="_method" type="hidden" value="PATCH">
      {{csrf_field()}}
      <div class="form-group{{ ($errors->has('first_name')) ? $errors->first('id') : '' }}">
        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{$user->first_name}}">
        {!! $errors->first('first_name','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group{{ ($errors->has('last_name')) ? $errors->first('id') : '' }}">
        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{$user->last_name}}">
        {!! $errors->first('last_name','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group{{ ($errors->has('roomNum')) ? $errors->first('id') : '' }}">
        <input type="text" name="roomNum" class="form-control" placeholder="Room Number" value="{{$user->roomNum}}">
        {!! $errors->first('roomNum','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group{{ ($errors->has('checkIn')) ? $errors->first('id') : '' }}">
        <input type="date" name="checkIn" class="form-control" placeholder="Check In Date" value="{{$user->checkIn}}">
        {!! $errors->first('checkIn','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group{{ ($errors->has('checkOut')) ? $errors->first('id') : '' }}">
        <input type="date" name="checkOut" class="form-control" placeholder="Check Out Date" value="{{$user->checkOut}}">
        {!! $errors->first('checkOut','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="save">
      </div>
    </form>
  </div>
  @stop
