@extends('layouts.default')
@section('content')
<form class="register-form" method="POST" action="{{route('users.store')}}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" />
        @if($errors->has('name'))
        <div class="text-danger">{{$errors->first('name')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" id="email">
        @if($errors->has('email'))
        <div class="text-danger">{{$errors->first('email')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
        @if($errors->has('password'))
        <div class="text-danger">{{$errors->first('password')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
@stop