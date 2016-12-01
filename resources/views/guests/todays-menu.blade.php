@extends('layouts.guestapp')
  @section('content')
  <div id="exTab1" class="container">
    <ul  class="nav nav-tabs">
      <li class="active guest-link"><a  href="#todaysmenu" data-toggle="tab">Today's Menu</a></li>
      <li class="guest-link"><a href="#myaccount" data-toggle="tab">My Account</a></li>
    </ul>

    <div class="tab-content clearfix">
      <div class="tab-pane active" id="todaysmenu">
        <h1>Todays Menu</h1>
        <hr><br/>

      <!-- Breakfast  -->
      <div class="row">
        <div class="col-md-12">
          <h2>Breakfast</h2>
          <p class="bg-info info-box">Order cut off for Breakfast Meals for tomorrow is until 5pm of the day only.</p>
        </div>
      </div>

        <div class="row">
          <div class="col-md-12">
            {{-- Success message  --}}
            @if(Session::has('alert-success'))
              <div class="alert alert-info"> {{Session::get('alert-success')}} </div>
            @endif
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <form class="form-horizontal" role="form" method="POST" action="/store">
              {{ csrf_field() }}
              <table class="table">
                <tr>
                  <label for="transDate"><h3>{{ $dateString }}</h3></label><br/>
                  <input  id ="transDate" type="text" name="transDate" value={{ $date }} hidden>
                </tr>

                @foreach($menus as $menu)
                <tr>
                  <td>Menu Name:</td>
                  <td>{{ $menu->menuName }}</td>
                </tr>

                <tr>
                  <td>Menu Description:</td>
                  <td>{{ $menu->menuDesc }}</td>
                </tr>

                <tr>
                  <td>Menu Price:</td>
                  <td>{{ $menu->menuPrice }}</td>
                </tr>

                <tr>
                  <td>Menu Category:</td>
                  <td>
                    {{ $menu->menuCatName }}
                    <input id="menuCatName" type="text" name="transDescription" value={{ $menu->menuCatName }} hidden>
                  </td>
                </tr>

                <input id="menuCatName" type="text" name="transDescription" value={{ $menu->menuCatName }} hidden>
                <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                <input type="text" name="menus_id" value={{ $menu->id }} hidden>

              </table>

              @endforeach

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Order
                  </button>
                </div>
              </div>
          </form>
          </div>

          <div class="col-md-6">
            <form class="form-horizontal" role="form" method="POST" action="/store">
              {{ csrf_field() }}
              <table class="table">
                <tr>
                  <label for="transDate"><h3>{{ $tomorrow }}</h3></label><br/>
                  <input  id ="transDate" type="text" name="transDate" value={{ $date }} hidden>
                </tr>

                @foreach($menus as $menu)
                <tr>
                  <td>Menu Name:</td>
                  <td>{{ $menu->menuName }}</td>
                </tr>

                <tr>
                  <td>Menu Description:</td>
                  <td>{{ $menu->menuDesc }}</td>
                </tr>

                <tr>
                  <td>Menu Price:</td>
                  <td>{{ $menu->menuPrice }}</td>
                </tr>

                <tr>
                  <td>Menu Category:</td>
                  <td>
                    {{ $menu->menuCatName }}
                    <input id="menuCatName" type="text" name="transDescription" value={{ $menu->menuCatName }} hidden>
                  </td>
                </tr>

                <input id="menuCatName" type="text" name="transDescription" value={{ $menu->menuCatName }} hidden>
                <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                <input type="text" name="menus_id" value={{ $menu->id }} hidden>

              </table>

              @endforeach

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Order
                  </button>
                </div>
              </div>
          </form>
          </div>
        </div>
      <!-- Dinner  -->
      <div class="row">
        <div class="col-md-12">
          <h2>Dinner</h2>
          <p class="bg-info info-box">Order cut off for Dinner Meals is until 10am of the day only.</p>
        </div>
      </div>

        <div class="row">
          <div class="col-md-12">
            {{-- Success message  --}}
            @if(Session::has('alert-success'))
              <div class="alert alert-info"> {{Session::get('alert-success')}} </div>
            @endif
          </div>
        </div>


        <div class="row">
          <div class="col-md-6">

              <form class="form-horizontal" role="form" method="POST" action="/store">
                {{ csrf_field() }}
                <table class="table">
                  <tr>
                    <label for="transDate"><h3>{{ $dateString }}</h3></label><br/>
                    <input  id ="transDate" type="text" name="transDate" value={{ $date }} hidden>
                  </tr>

                  @foreach($menus as $menu)
                  <tr>
                    <td>Menu Name:</td>
                    <td>{{ $menu->menuName }}</td>
                  </tr>

                  <tr>
                    <td>Menu Description:</td>
                    <td>{{ $menu->menuDesc }}</td>
                  </tr>

                  <tr>
                    <td>Menu Price:</td>
                    <td>{{ $menu->menuPrice }}</td>
                  </tr>

                  <tr>
                    <td>Menu Category:</td>
                    <td>
                      {{ $menu->menuCatName }}
                      <input id="menuCatName" type="text" name="transDescription" value={{ $menu->menuCatName }} hidden>
                    </td>
                  </tr>

                  <input id="menuCatName" type="text" name="transDescription" value={{ $menu->menuCatName }} hidden>
                  <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                  <input type="text" name="menus_id" value={{ $menu->id }} hidden>

                </table>

                @endforeach

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Order
                    </button>
                  </div>
                </div>
            </form>
          </div>

          <!-- Tomorrows's Menu  -->
          <div class="col-md-6">

              <form class="form-horizontal" role="form" method="POST" action="/store">
                {{ csrf_field() }}
                <table class="table">
                  <tr>
                    <label for="transDate"><h3>{{ $tomorrow }}</h3></label><br/>
                    <input  id ="transDate" type="text" name="transDate" value={{ $date }} hidden>
                  </tr>

                  @foreach($menus as $menu)
                  <tr>
                    <td>Menu Name:</td>
                    <td>{{ $menu->menuName }}</td>
                  </tr>

                  <tr>
                    <td>Menu Description:</td>
                    <td>{{ $menu->menuDesc }}</td>
                  </tr>

                  <tr>
                    <td>Menu Price:</td>
                    <td>{{ $menu->menuPrice }}</td>
                  </tr>

                  <tr>
                    <td>Menu Category:</td>
                    <td>
                      {{ $menu->menuCatName }}
                      <input id="menuCatName" type="text" name="transDescription" value={{ $menu->menuCatName }} hidden>
                    </td>
                  </tr>

                  <input id="menuCatName" type="text" name="transDescription" value={{ $menu->menuCatName }} hidden>
                  <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                  <input type="text" name="menus_id" value={{ $menu->id }} hidden>

                </table>

                @endforeach

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Order
                    </button>
                  </div>
                </div>
            </form>
          </div>
        </div>

      </div>




      <div class="tab-pane" id="myaccount">
        <h1>My Account</h1>
        <hr>
      </div>
    </div>
  </div>




@stop
