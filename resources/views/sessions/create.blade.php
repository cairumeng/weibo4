@extends('layouts.default')
@section('content')

<div class="card">
    <div class="card-header">
        Login
    </div>
    <div class="card-body">
        <form class="register-form" method="POST" action="{{ route('sessions.store' )}}">
            @csrf
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
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

    </div>
</div>
@stop