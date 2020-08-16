<div class="edit-avatar">
    <img src="{{$user->avatar}}" alt="{{$user->name}}">
    <div class="row text-center mt-3">
        <div class="col-md-4">
            <a href="{{route('users.show',$user) }}">
                <h5>Statuses</h5>
                {{$user->statuses()->count()}}
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{route('users.followings',$user) }}">
                <h5>Followings</h5>
                {{$user->followings()->count()}}
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{route('users.followers',$user) }}">
                <h5>Followers</h5>
                {{$user->followers()->count()}}
        </div>

        </a>
    </div>

</div>