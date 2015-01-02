<!doctype html>
<html lang="en">
<head>
@section('head')
<meta charset="UTF-8">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
@show
    @section('javascript')
<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@show
</head>

<body>
<div class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid"> 
    Brand and toggle get grouped for better mobile display
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="{{ URL::route('home') }}">Home</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        @if(!Auth::check())
        <li><a href="{{ URL::route('register') }}">Register</a></li>
        <li><a href="{{ URL::route('login') }}">Login</a></li>
        @else
        <li><a href="{{ URL::route('getlogout') }}">Logout</a></li>
        @endif
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</div>
@if(Session::has('Success'))
<div class="alert alert-success">{{ Session::get('Success') }}</div>
@elseif(Session::has('Fail'))
<div class="alert alert-danger">{{ Session::get('Fail') }}</div>
@endif
<div class="container-fluid"> @yield('content') </div>
</body>
</html>
