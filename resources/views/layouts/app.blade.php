<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
   <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

        $('.dropdown-toggle').dropdown();
    </script>
</head>
<body>
    <div id="app">
      <header>
        <nav class="navbar navbar-default navbar-fixed-top" id="nav_app">
          <div class="container-fluid">
            <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/home">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                            <li class="dropdown">
                                <a class="dmenu" id ="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Hi!&nbsp;{{ Sentinel::getUser()->first_name}}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                    </ul>
                </div>
            </div>
        </nav>
      </header>

        <div class="container" style="width:100%; padding-left:0px; padding-top:3.5%;">


            <div class="admin_menu">
              @if (Sentinel::getUser()->roles()->first()->slug == 'admin')
                <ul class="admin_ul">
                  <li class="admin_ul"><span class="glyphicon glyphicon-user icns" ></span><a href="{{ url('/admin') }}">Guests</a></li>
                  <li class="admin_ul"><span class="glyphicon glyphicon-list-alt icns"></span><a href="{{ url('/menu') }}">Menu</a></li>
                  <li class="admin_ul"><span class="glyphicon glyphicon glyphicon-tasks icns"></span><a href="{{ url('/transactions') }}">Guest Transactions</a></li>
                </ul>

              @else
                <ul class="admin_ul">
                  <li class="admin_ul"><span class="glyphicon glyphicon-user icns" ></span><a href="/meal-order/create">Meal Order</a></li>
                  <li class="admin_ul"><span class="glyphicon glyphicon-list-alt icns"></span><a href="#">My Account</a></li>
                </ul>

              @endif
            </div>

            <div class="dashboard">@yield('content')</div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
