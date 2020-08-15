<li class="status">
    <div class="status-head">
        <img src="{{$user->avatar}}" alt="{{$user->name}}">
        <h5 class="d-inline">{{$user->name}}/{{$status->created_at->diffForHumans()}}</h5>
    </div>
    <div>{{$status->content}}</div>

</li>