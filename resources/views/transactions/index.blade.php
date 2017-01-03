@extends('layouts.app')
  @section('content')
  <h1>Transactions</h1>
  <nav aria-label="...">
    <ul class="pagination pagination-lg" style="float:right;">
      <li>
        <button type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-chevron-left" ></span>
          <a href="<?php echo $_SERVER['PHP_SELF'].'?month='.($month == 1 ? 12 : $month -1).'&year='.($month == 1 ? $year - 1 : $year); ?>">Last Month</a>
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?month='.($month == 12 ? 1 : 1 + $month).'&year='.($month == 12 ? 1 + $year : $year); ?>">Next  Month</a>
          <span class="glyphicon glyphicon-chevron-right" ></span>
        </button>
      </li>
    </ul>
  </nav>

  <table class="table table-striped table-bordered">
    <tr>
      <td>Guest Name</td>

      @if($date < 31)
        <?php
          $date = $date;
        ?>
      @endif

        @for($day= 1; $day <= 31; $day++)
          <?php
          $d =  strtotime("$year-$month-$day");
          echo "<td = id '".date('y-m-d', $d)."'>". date('Md', $d) ."<br>". date('D', $d) ."</td>";
          ?>
        @endfor
    </tr>

    @foreach ($guests as $guest)
    <tr>
      <td>{{$guest->first_name}}&nbsp;&nbsp;{{$guest->last_name}}</td>

      @if($date < 31)
        <?php
          $date = $date;
        ?>
      @endif
        @for($day= 1; $day <= 31; $day++)
          <?php
          $d =  strtotime("$year-$month-$day");
          echo "<td = id '".date('y-m-d', $d)."'>"."</td>";
          ?>
        @endfor
    </tr>
    @endforeach
  </table>
@stop
