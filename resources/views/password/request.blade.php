@extends('layouts.default')
@section('content')

<div class="card">
    <div class="card-header">
        Enter your Email
    </div>
    <div class="card-body">
        <form class="register-form" method="POST" action="{{ route('password.email' )}}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email">
                @if($errors->has('email'))
                <div class="text-danger">{{$errors->first('email')}}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

    </div>
</div>
@stop