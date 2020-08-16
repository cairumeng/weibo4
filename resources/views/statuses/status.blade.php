<li class="status">
    <div class="status-head">
        <img src="{{$user->avatar}}" alt="{{$user->name}}" href="{{ route('users.show',$user)}}">
        <h5 class="d-inline">{{$user->name}}/{{$status->created_at->diffForHumans()}}</h5>
        @if($user->id ===Auth::id())
        @can('destroy',$status)
        <form method="POST" action="{{route('statuses.destroy',$status)}}">
            @csrf
            @method('delete')
            <button class="btn btn-danger float-right">Delete</button>
        </form>
        @endcan
        @else
        @can('follow',$user)
        @if(Auth::user()->isFollowing($user))
        <form method="POST" action="{{route('followers.destroy',$user)}}">
            @csrf
            @method('delete')
            <button class="btn btn-warning float-right">Unfollow</button>
        </form>

        @else
        <form method="POST" action="{{route('followers.store',$user)}}">
            @csrf
            <button class="btn btn-primary float-right">Follow</button>
        </form>
        @endif
        @endcan
        @endif
    </div>
    <div>{{$status->content}}</div>

</li>