@extends('layouts.app')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Create Menu Details</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form class="" action="{{route('menu.store')}}" method="post">
          {{ csrf_field() }}
        <div class="form-group{{ ($errors->has('menuName')) ? $errors->first('menuName') : '' }}">
          <input type="text" name="menuName" class="form-control" placeholder="Enter Menu Name Here">
          {!! $errors->first('menuName','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{{ ($errors->has('menuDesc')) ? $errors->first('menuName') : '' }}">
          <input type="text" name="menuDesc" class="form-control" placeholder="Enter Menu Description Here">
          {!! $errors->first('menuDesc','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{{ ($errors->has('menuPrice')) ? $errors->first('menuName') : '' }}">
          <input type="number" name="menuPrice" class="form-control" placeholder="Enter Menu Price Here">
          {!! $errors->first('menuPrice','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{{ ($errors->has('menuDate')) ? $errors->first('menuName') : '' }}">
          <input type="date" name="menuDate" class="form-control" placeholder="Set Menu Date">
          {!! $errors->first('menuDate','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{{ ($errors->has('menu_cat_id')) ? $errors->first('menuName') : '' }}">
          <label>
            <input type="radio" name="menu_cat_id" value="1">Breakfast
          </label>
          <label>
            <input type="radio" name="menu_cat_id" value="2">Dinner
          </label>
          <label>
            <input type="radio" name="menu_cat_id" value="3">Others
          </label>
          {!! $errors->first('menu_cat_id','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="save">
        </div>
      </form>
    </div>
  </div>
  @stop
