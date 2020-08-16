@extends('layouts.default')
@section('content')
<section>
    @include('shared._user_info',$user)
</section>
@if($followings->count()>0)
<section>
    <ul class="list-unstyled col-md-8 offset-md-2">
        @foreach($followings as $following)
        <li class="follower-avatar mt-5">
            <a href="{{route('users.show',$following)}}" class="">
                <img src="{{$following->avatar}}" alt="{{$following->name}}">
                <h5 class="d-inline ml-5">{{$following->name}}</h5>
            </a>
            @if(Auth::user()->isFollowing($following))
            <form method="POST" action="{{route('followers.destroy',$following)}}">
                @csrf
                @method('delete')
                <button class="btn btn-warning float-right">Unfollow</button>
            </form>
            @else
            <form method="POST" action="{{route('followers.store',$following)}}">
                @csrf
                <button class="btn btn-primary float-right">Follow</button>
            </form>
            @endif
        </li>
        @endforeach
    </ul>
    {{ $followings->links() }}
</section>
@else
<h5>You have'nt followed anyone yet!</h5>
@endif
@stop