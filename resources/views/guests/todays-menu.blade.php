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
                <label><h3>{{ $dateString }}</h3></label><br/>
                <input  id ="transDate" type="text" name="transDate" value= {{ $date }} hidden>

                @if($breakfasts == '[]')
                <table class="table">
                  <tr>
                    <td>No Menu Available</td>
                  </tr>
                </table>

                @else
                  @foreach($breakfasts as $breakfast)
                  <table class="table">
                  <tr>
                    <td>Menu Name:</td>
                    <td>{{ $breakfast->menuName }}</td>
                  </tr>

                  <tr>
                    <td>Menu Description:</td>
                    <td>{{ $breakfast->menuDesc }}</td>
                  </tr>

                  <tr>
                    <td>Menu Price:</td>
                    <td>{{ $breakfast->menuPrice }}</td>
                  </tr>

                  <tr>
                    <td>Menu Category:</td>
                    <td>
                      {{ $breakfast->menuCatName }}
                      <input id="menuCatName" type="hidden" name="transDescription" value={{ $breakfast->menuCatName }} hidden>
                    </td>
                  </tr>
                </table>

                <input id="menuCatName" type="hidden" name="transDescription" value={{ $breakfast->menuCatName }} hidden>
                <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                <input type="text" name="menus_id" value={{ $breakfast->id }} hidden>
                @endforeach


              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  @if($transactions == '[]')
                    <button type="submit" class="btn btn-primary">
                      Order
                    </button>
                  @else
                  <button type="button" class="btn btn-primary disabled">
                    Order
                  </button>
                  @endif
                </div>
              </div>

              @endif
          </form>
          </div>
          <!-- Breakfast Tomorrow  -->
          <div class="col-md-6">
            <form class="form-horizontal" role="form" method="POST" action="/store">
              {{ csrf_field() }}
                <label for="transDate"><h3>{{ $tomorrow }}</h3></label><br/>
                <input  id ="transDate" type="text" name="transDate" value= {{ $tomorrow }} hidden>

                @if($breakfastsTomorrow == '[]')
                  <table class="table">
                    <tr>
                      <td>No Menu Available</td>
                    </tr>
                  </table>


                @else

                  @foreach($breakfastsTomorrow as $breakfastTomorrow)
                  <table class="table">
                  <tr>
                    <td>Menu Name:</td>
                    <td>{{ $breakfastTomorrow->menuName }}</td>
                  </tr>

                  <tr>
                    <td>Menu Description:</td>
                    <td>{{ $breakfastTomorrow->menuDesc }}</td>
                  </tr>

                  <tr>
                    <td>Menu Price:</td>
                    <td>{{ $breakfastTomorrow->menuPrice }}</td>
                  </tr>

                  <tr>
                    <td>Menu Category:</td>
                    <td>
                      {{ $breakfastTomorrow->menuCatName }}
                      <input id="menuCatName" type="text" name="transDescription" value={{ $breakfastTomorrow->menuCatName }} hidden>
                    </td>
                  </tr>
                </table>

                <input id="menuCatName" type="text" name="transDescription" value={{ $breakfastTomorrow->menuCatName }} hidden>
                <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                <input type="text" name="menus_id" value={{ $breakfastTomorrow->id }} hidden>
                @endforeach


              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Order
                  </button>
                </div>
              </div>

              @endif
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

                @if($dinners == '[]')
                <table class="table">
                  <tr>
                    <td>No Menu Available</td>
                  </tr>
                </table>
                @else
                  <table class="table">
                    <tr>
                      <label for="transDate"><h3>{{ $dateString }}</h3></label><br/>
                      <input  id ="transDate" type="text" name="transDate" value={{ $date }} hidden>
                    </tr>

                    @foreach($dinners as $dinner)
                    <tr>
                      <td>Menu Name:</td>
                      <td>{{ $dinner->menuName }}</td>
                    </tr>

                    <tr>
                      <td>Menu Description:</td>
                      <td>{{ $dinner->menuDesc }}</td>
                    </tr>

                    <tr>
                      <td>Menu Price:</td>
                      <td>{{ $dinner->menuPrice }}</td>
                    </tr>

                    <tr>
                      <td>Menu Category:</td>
                      <td>
                        {{ $dinner->menuCatName }}
                        <input id="menuCatName" type="text" name="transDescription" value={{ $dinner->menuCatName }} hidden>
                      </td>
                    </tr>
                  </table>

                <input id="menuCatName" type="text" name="transDescription" value={{ $dinner->menuCatName }} hidden>
                <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                <input type="text" name="menus_id" value={{ $dinner->id }} hidden>
                @endforeach


                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Order
                    </button>
                  </div>
                </div>

              @endif
            </form>
          </div>

          <!-- Tomorrows's Dinner Menu  -->
          <div class="col-md-6">

              <form class="form-horizontal" role="form" method="POST" action="/store">
                {{ csrf_field() }}

                @if($dinners == '[]')
                <table class="table">
                  <tr>
                    <td>No Menu Available</td>
                  </tr>
                </table>
                @else
                  <table class="table">
                    <tr>
                      <label for="transDate"><h3>{{ $tomorrow }}</h3></label><br/>
                      <input  id ="transDate" type="text" name="transDate" value={{ $date }} hidden>
                    </tr>

                    @foreach($dinnersTomorrow as $dinnerTomorrow)
                    <tr>
                      <td>Menu Name:</td>
                      <td>{{ $dinnerTomorrow->menuName }}</td>
                    </tr>

                    <tr>
                      <td>Menu Description:</td>
                      <td>{{ $dinnerTomorrow->menuDesc }}</td>
                    </tr>

                    <tr>
                      <td>Menu Price:</td>
                      <td>{{ $dinnerTomorrow->menuPrice }}</td>
                    </tr>

                    <tr>
                      <td>Menu Category:</td>
                      <td>
                        {{ $dinnerTomorrow->menuCatName }}
                        <input id="menuCatName" type="text" name="transDescription" value={{ $dinnerTomorrow->menuCatName }} hidden>
                      </td>
                    </tr>
                  </table>

                <input id="menuCatName" type="text" name="transDescription" value={{ $dinnerTomorrow->menuCatName }} hidden>
                <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                <input type="text" name="menus_id" value={{ $dinnerTomorrow->id }} hidden>

                @endforeach

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Order
                    </button>
                  </div>
                </div>
              @endif
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
