@extends('layouts.app')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Edit Menu Data</h1>
    </div>
  </div>
  <div class="row">
    <form class="" action="{{route('menu.update',$menu->id)}}" method="post">
      <input name="_method" type="hidden" value="PATCH">
      {{csrf_field()}}
      <div class="form-group{{ ($errors->has('menuName')) ? $errors->first('menuName') : '' }}">
        <input type="text" name="menuName" class="form-control" placeholder="Menu Name" value="{{$menu->menuName}}">
        {!! $errors->first('menuName','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group{{ ($errors->has('menuDesc')) ? $errors->first('menuName') : '' }}">
        <input type="text" name="menuDesc" class="form-control" placeholder="Menu Description" value="{{$menu->menuDesc}}">
        {!! $errors->first('menuDesc','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group{{ ($errors->has('menuPrice')) ? $errors->first('menuName') : '' }}">
        <input type="text" name="menuPrice" class="form-control" placeholder="Menu Price" value="{{$menu->menuPrice}}">
        {!! $errors->first('menuPrice','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group{{ ($errors->has('menuDate')) ? $errors->first('menuName') : '' }}">
        <input type="date" name="menuDate" class="form-control" placeholder="Menu Date Availability" value="{{$menu->menuDate}}">
        {!! $errors->first('menuDate','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="save">
      </div>
    </form>
  </div>
  @stop
