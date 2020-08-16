@extends('layouts.default')
@section('content')
<section>
    @include('shared._user_info',$user)
</section>
@if($followers->count()>0)
<section>
    <ul class="list-unstyled col-md-8 offset-md-2">
        @foreach($followers as $follower)
        <li class="follower-avatar mt-5">
            <a href="{{route('users.show',$follower)}}" class="">
                <img src="{{$follower->avatar}}" alt="{{$follower->name}}">
                <h5 class="d-inline ml-5">{{$follower->name}}</h5>
            </a>
            @can('follow',$follower)
            @if(Auth::user()->isFollowing($follower))
            <form method="POST" action="{{route('followers.destroy', $follower)}}">
                @csrf
                @method('delete')
                <button class="btn btn-warning float-right">Unfollow</button>
            </form>
            @else
            <form method="POST" action="{{route('followers.store',$follower)}}">
                @csrf
                <button class="btn btn-primary float-right">Follow</button>
            </form>
            @endif
            @endcan
        </li>
        @endforeach
    </ul>
    {{ $followers->links() }}
</section>
@else
<h5>You have no followers yet!</h5>
@endif
@stop