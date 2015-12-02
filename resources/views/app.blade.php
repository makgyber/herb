<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Shogun Suites</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reservation.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery2.js') }}"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">November 30, 2015</a></li>
                <li><a href="#" id="clock">3:13 am</a></li>
                <li><a href="{{url('auth/logout')}}"><span class="glyphicon glyphicon-log-out"></span></a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    @yield('content')
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jclock.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#clock").jclock({foreground:'white',background:'green',fontSize:'16px',timeNotation:'24h'});
    });
</script>
</body>
</html>


