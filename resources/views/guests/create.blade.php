@extends('layouts.guestapp')
  @section('content')
    <div class="row">
      <div class="col-md-12">
        <h1>Menu for Today</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        @foreach($menus as $menu)
        <form class="form-horizontal" role="form" method="POST" action="/create">
          {{ csrf_field() }}

          <div class="form-group{{ ($errors->has('transDate')) ? $errors->first('transDate') : '' }}">
            <label for="transDate">{{ $dateString }}</label><br/>
              <input  id ="transDate" type="text" name="transDate" value={{ $date }} hidden>
              {!! $errors->first('transDate','<p class="help-block">:message</p>') !!}
          </div>

          <label>{{ $menu->menuName }}</label><br/>
          <label>{{ $menu->menuPrice }}</label><br/>

          <div class="form-group{{ ($errors->has('menuCatName')) ? $errors->first('menuCatName') : '' }}">
            <label for="menuCatName">{{ $menu->menuCatName }}</label>
              <input id="menuCatName" type="text" name="transDescription" value={{ $menu->menuCatName }} hidden>
              {!! $errors->first('menuCatName','<p class="help-block">:message</p>') !!}

          <input type="text" name="guests_id" value={{ Auth::user()->id }} hidden><br/>

          <div class="form-group{{ ($errors->has('menus_id')) ? $errors->first('menus_id') : '' }}">
            <input type="text" name="menus_id" value={{ $menu->id }} hidden>
              {!! $errors->first('menus_id','<p class="help-block">:message</p>') !!}

          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Order
                  </button>
              </div>
          </div>
        </form>
        @endforeach
      </div>
    </div>

@stop
