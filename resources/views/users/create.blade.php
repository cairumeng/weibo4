@extends('layouts.default')
@section('content')
<form class="register-form">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" value="{{old('name')}}" />
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
@stop