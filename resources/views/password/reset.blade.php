@extends('layouts.default')
@section('content')

<div class="card">
    <div class="card-header">
        Reset your password
    </div>
    <div class="card-body">
        <form class="register-form" method="POST" action="{{route('password.update')}}">
            @csrf
            <input name="email" value="{{$email}}" type="hidden">
            <input type="hidden" value="{{$token}}" name="token">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                @if($errors->has('password'))
                <div class="text-danger">{{$errors->first('password')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>

@stop