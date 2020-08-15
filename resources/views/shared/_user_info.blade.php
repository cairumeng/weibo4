<div class="edit-avatar">
    <img src="{{$user->avatar}}" alt="{{$user->name}}" class="">
    <div class="">
        <h5>Statuses</h5>
        <div>{{$user->statuses()->count()}}</div>
    </div>
</div>