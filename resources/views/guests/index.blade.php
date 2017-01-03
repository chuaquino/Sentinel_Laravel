@extends('layouts.guestapp')
  @section('content')
  <div id="exTab1" class="container">
    <ul  class="nav nav-tabs">
      <li class="active guest-link"><a  href="#todaysmenu" data-toggle="tab"><h3>Today's Menu</h3></a></li>
      <li class="guest-link"><a href="#myaccount" data-toggle="tab"><h3>My Account</h3></a></li>
    </ul>

    <div class="tab-content clearfix">
      <div class="tab-pane active" id="todaysmenu">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h3>
                <a class="collapse_link" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Breakfast
                </a>
              </h3>
              <p>Order cut off for Breakfast Meals for tomorrow is until 5pm of the day only.</p>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    {{-- Success message  --}}
                    @if(Session::has('alert-success-breakfast'))
                      <div class="alert alert-info"> {{Session::get('alert-success-breakfast')}} </div>
                    @endif
                    @if(Session::has('alert-success-breakfastTmrw'))
                      <div class="alert alert-info"> {{Session::get('alert-success-breakfastTmrw')}} </div>
                    @endif

                    @if(Session::has('alert-delete'))
                      <div class="alert alert-info"> {{Session::get('alert-delete')}} </div>
                    @endif
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <form class="form-horizontal" role="form" method="POST" action="/storeBreakfast">
                      {{ csrf_field() }}
                        <label><h3>{{ $dateString }}</h3></label><br/>
                        <input type="text" name="transDate" value= {{ $date }} hidden>

                        @if($breakfasts == '[]')
                        <table class="table">
                          <tr>
                            <td>No Menu Available</td>
                          </tr>
                        </table>

                        @else
                          @foreach($breakfasts as $breakfast)
                          <table class="table disabled">
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
                            </td>
                          </tr>
                        </table>

                        <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                        <input type="text" name="menus_id" value={{ $breakfast->id }} hidden>
                        <input type="hidden" name="transCat" value={{ $breakfast->menuCatName }} hidden>
                        <input type="hidden" name="transDescription" value={{ $breakfast->menuDesc }} hidden>

                        @endforeach

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                          @if($breakfast_cutoff == 'Can Order')
                              <button type="submit" class="btn btn-primary">
                                Order
                              </button>
                          @else
                          <span>Breakfast Cutoff</span>
                          <button type="button" class="btn btn-primary disabled">
                            Order
                          </button>
                          @endif
                        </div>
                      </div>

                      @endif
                    </form>

                    <div>
                    @if($transactionsBreakfast != '[]')
                      @foreach($transactionsBreakfast as $transactionBreakfast)
                      <form class="" action="{{route('guests.destroy',$transactionBreakfast->id)}}" method="post">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger delete_order" onclick="return confirm('Are you sure you want to cancel your order?');" name="id" value="Cancel Order">
                      </form>
                      @endforeach
                    @endif
                    </div>
                  </div>

                <!-- Breakfast Tomorrow  -->
                  <div class="col-md-6">
                    <form class="form-horizontal" role="form" method="POST" action="/storeBreakfastTmrw">
                      {{ csrf_field() }}
                        <label><h3>{{ $tmrrw }}</h3></label><br/>
                        <input type="text" name="transDate" value= {{ $tomorrow }} hidden>

                        @if($breakfastsTmrw == '[]')
                        <table class="table">
                          <tr>
                            <td>No Menu Available</td>
                          </tr>
                        </table>

                        @else
                          @foreach($breakfastsTmrw as $breakfastTmrw)
                          <table class="table">
                          <tr>
                            <td>Menu Name:</td>
                            <td>{{ $breakfastTmrw->menuName }}</td>
                          </tr>

                          <tr>
                            <td>Menu Description:</td>
                            <td>{{ $breakfastTmrw->menuDesc }}</td>
                          </tr>

                          <tr>
                            <td>Menu Price:</td>
                            <td>{{ $breakfastTmrw->menuPrice }}</td>
                          </tr>

                          <tr>
                            <td>Menu Category:</td>
                            <td>
                              {{ $breakfastTmrw->menuCatName }}
                            </td>
                          </tr>
                        </table>

                        <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                        <input type="text" name="menus_id" value={{ $breakfastTmrw->id }} hidden>
                        <input type="hidden" name="transCat" value={{ $breakfastTmrw->menuCatName }} hidden>
                        <input type="hidden" name="transDescription" value={{ $breakfastTmrw->menuDesc }} hidden>

                        @endforeach

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                          @if($transactionsBreakfastTmrw == '[]')
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

                    <div>
                    @if($transactionsBreakfastTmrw != '[]')
                      @foreach($transactionsBreakfastTmrw as $transactionBreakfastTmrw)
                      <form class="" action="{{route('guests.destroy',$transactionBreakfastTmrw->id)}}" method="post">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger delete_order" onclick="return confirm('Are you sure you want to cancel your order?');" name="id" value="Cancel Order">
                      </form>
                      @endforeach
                    @endif
                    </div>
                  </div>

          </div>
        </div>
      </div>
    </div>

          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h3>
                <a class="collapsed collapse_link" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Dinner
                </a>
              </h3>
              Order cut off for Dinner Meals is until 10am of the day only.
            </div>

            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                <!-- Dinner  -->
                  <div class="row">
                    <div class="col-md-12">
                      {{-- Success message  --}}
                      @if(Session::has('alert-success-dinner'))
                        <div class="alert alert-info"> {{Session::get('alert-success-dinner')}} </div>
                      @endif
                      @if(Session::has('alert-success-dinnerTmrw'))
                        <div class="alert alert-info"> {{Session::get('alert-success-dinnerTmrw')}} </div>
                      @endif

                      @if(Session::has('alert-delete'))
                        <div class="alert alert-info"> {{Session::get('alert-delete')}} </div>
                      @endif
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <form class="form-horizontal" role="form" method="POST" action="/storeDinner">
                        {{ csrf_field() }}
                          <label><h3>{{ $dateString }}</h3></label><br/>
                          <input type="text" name="transDate" value= {{ $date }} hidden>

                          @if($dinners == '[]')
                          <table class="table">
                            <tr>
                              <td>No Menu Available</td>
                            </tr>
                          </table>

                          @else
                            @foreach($dinners as $dinner)
                            <table class="table">
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
                              </td>
                            </tr>
                          </table>

                          <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                          <input type="text" name="menus_id" value={{ $dinner->id }} hidden>
                          <input type="hidden" name="transCat" value={{ $dinner->menuCatName }} hidden>
                          <input type="hidden" name="transDescription" value={{ $dinner->menuDesc }} hidden>

                          @endforeach

                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                            @if($transactionsDinner == '[]')
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

                      <div>
                      @if($transactionsDinner != '[]')
                        @foreach($transactionsDinner as $transactionDinner)
                        <form class="" action="{{route('guests.destroy',$transactionDinner->id)}}" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" class="btn btn-danger delete_order" onclick="return confirm('Are you sure you want to cancel your order?');" name="id" value="Cancel Order">
                        </form>
                        @endforeach
                      @endif
                      </div>
                    </div>

                    <!-- Tomorrows's Dinner Menu  -->
                    <div class="col-md-6">
                      <form class="form-horizontal" role="form" method="POST" action="/storeDinnerTmrw">
                        {{ csrf_field() }}
                          <label><h3>{{ $tmrrw }}</h3></label><br/>
                          <input type="text" name="transDate" value= {{ $tomorrow }} hidden>

                          @if($dinnersTmrw == '[]')
                          <table class="table">
                            <tr>
                              <td>No Menu Available</td>
                            </tr>
                          </table>

                          @else
                            @foreach($dinnersTmrw as $dinnerTmrw)
                            <table class="table">
                            <tr>
                              <td>Menu Name:</td>
                              <td>{{ $dinnerTmrw->menuName }}</td>
                            </tr>

                            <tr>
                              <td>Menu Description:</td>
                              <td>{{ $dinnerTmrw->menuDesc }}</td>
                            </tr>

                            <tr>
                              <td>Menu Price:</td>
                              <td>{{ $dinnerTmrw->menuPrice }}</td>
                            </tr>

                            <tr>
                              <td>Menu Category:</td>
                              <td>
                                {{ $dinnerTmrw->menuCatName }}
                              </td>
                            </tr>
                          </table>

                          <input type="text" name="guests_id" value="{{ Sentinel::getUser()->id}}" hidden><br/>
                          <input type="text" name="menus_id" value={{ $dinnerTmrw->id }} hidden>
                          <input type="hidden" name="transCat" value={{ $dinnerTmrw->menuCatName }} hidden>
                          <input type="hidden" name="transDescription" value={{ $dinnerTmrw->menuDesc }} hidden>

                          @endforeach

                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                            @if($transactionsDinnerTmrw == '[]')
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

                      <div>
                      @if($transactionsDinnerTmrw != '[]')
                        @foreach($transactionsDinnerTmrw as $transactionDinnerTmrw)
                        <form class="" action="{{route('guests.destroy',$transactionDinnerTmrw->id)}}" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" class="btn btn-danger delete_order" onclick="return confirm('Are you sure you want to cancel your order?');" name="id" value="Cancel Order">
                        </form>
                        @endforeach
                      @endif
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
      </div>
    </div>


    <div class="tab-pane" id="myaccount">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>
                <a class="collapse_link">
                  {{ Sentinel::getUser()->first_name}} {{ Sentinel::getUser()->last_name}}
                </a>
              </h4>
            </div>
              <div class="panel-body">
                <table class="table">
                  <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Item Price</th>
                  </tr>
                  <?php $no=1; ?>
                  @foreach($transactions as $transaction)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$transaction->transDate}}</td>
                    <td>{{$transaction->transCat}}</td>
                    <td>{{$transaction->transDescription}}</td>
                    <td>{{$transaction->menuPrice}}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>Total</b></td>
                    <td></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
@stop
