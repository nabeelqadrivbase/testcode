@extends('layout.master')


@section('head')
	@parent
<title>Register!!</title>
@stop



@section('content')
<div class="container">
  <div class="content" style="width:30%;">
    <h1>Register</h1>
    <form role="form" method="post" action="">
      <div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
        <label for="email">Email: </label>
        <input type="text" id="email" name="email" class="form-control">
        @if($errors->has('email'))
        {{ $errors->first('email')}}
        @endif </div>
      <div class="form-group{{ ($errors->has('name')) ? ' has-error' : '' }}">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" class="form-control">
        @if($errors->has('name'))
        {{ $errors->first('name')}}
        @endif </div>
      <div class="form-group{{ ($errors->has('username')) ? ' has-error' : '' }}">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" class="form-control">
        @if($errors->has('username'))
        {{ $errors->first('username')}}
        @endif </div>
      <div class="form-group{{ ($errors->has('pass1')) ? ' has-error' : '' }}">
        <label for="pass1">Password: </label>
        <input type="password" id="pass1" name="pass1" class="form-control">
        @if($errors->has('pass1'))
        {{ $errors->first('pass1')}}
        @endif </div>
      <div class="form-group{{ ($errors->has('pass2')) ? ' has-error' : '' }}">
        <label for="pass2">Confirm Password: </label>
        <input type="password" id="pass2" name="pass2" class="form-control">
        @if($errors->has('pass2'))
        {{ $errors->first('pass2')}}
        @endif </div>
      {{ Form::token() }}
      <div class="form-group">
        <input type="submit" value="Register" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>
@stop