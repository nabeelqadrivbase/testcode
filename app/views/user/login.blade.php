@extends('layout.master')


@section('head')
	@parent
    <title>Login!!</title>
@stop



@section('content')
<div class="container">
 <div class="content" style="width:30%;">
    <h1>Login</h1>
        <form role="form" method="post" action="{{ URL::route('UserLogin') }}">
         <div class="form-group{{ ($errors->has('username')) ? ' has-error' : '' }}">
             <label for="username">Username: </label>
                <input type="text" id="username" name="username" class="form-control">
                @if($errors->has('username'))
                 {{ $errors->first('username')}}
                 @endif
            </div>
            <div class="form-group{{ ($errors->has('pass1')) ? ' has-error' : '' }}">
             <label for="pass1">Password: </label>
                <input type="password" id="pass1" name="pass1" class="form-control">
                @if($errors->has('pass1'))
                 {{ $errors->first('pass1')}}
                 @endif
            </div>
            <div class="checkbox">
             <label for="remember">
                 <input type="checkbox" name="remember" id="remember">
                    Remember me
                </label>
            </div>
            
            {{ Form::token() }}
            <div class="form-group">
             <input type="submit" value="Login" class="btn btn-primary">
            </div>
            
        </form>
    </div>
</div>
@stop