@extends('layouts.guestapp')
  @section('content')
  <h1>My Calendar</h1>{{$date}}

  <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week == 1 ? 52 : $week -1).'&year='.($week == 1 ? $year - 1 : $year); ?>">Pre Week</a> <!--Previous week-->
  <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week == 52 ? 1 : 1 + $week).'&year='.($week == 52 ? 1 + $year : $year); ?>">Next  Week</a> <!--Next week-->

  <table class="table">
      <tr>
          <td>Menu Category</td>
  <?php
  if($week < 10) {
      $week = '0'. $week;
  }
  for($day= 1; $day <= 7; $day++) {
      $d = strtotime($year ."W". $week . $day);

      echo "<td = id '".date('y-m-d', $d)."'>". date('l', $d) ."<br>". date('M d', $d) ."</td>";
  }
  ?>
      </tr>

      <tr>
        <td>Breakfast</td>
      </tr>

      <tr>
        <td>Dinner</td>
      </tr>
  </table>
@stop
