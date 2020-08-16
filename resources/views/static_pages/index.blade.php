@extends('layouts.default')
@section('content')
<section class="post-status">
    <div class="row">
        @if(Auth::check())
        <form method="POST" action="{{ route('statuses.store') }}" class="col-md-6 ">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="content" placeholder="Post your blog here!" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2 float-right">Post</button>
        </form>
        <div class=" col-md-6 text-center">
            @include('shared._user_info',['user'=>Auth::user()])
        </div>
        @endif
    </div>
</section>
<section class="statuses">
    <ul class="list-unstyled col-md-8 offset-md-2">
        @foreach($statuses as $status)
        @include('statuses.status',['user'=>$status->user])
        @endforeach
    </ul>
    {{ $statuses->links() }}
</section>
@stop