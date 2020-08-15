@extends('layouts.default')
@section('content')

<div class="card">
    <div class="card-header">
        Edit information
    </div>
    <div class="card-body">
        <div class="edit-avatar">
            <img src="{{$user->avatar}}" alt="{{$user->name}}" id="current_avatar"
                onclick="document.querySelector('#avatar').click()" />
            <div id="upload_message"></div>
            <input type="file" id="avatar" hidden>
        </div>
        @can('update',$user)
        <form class="register-form" method="POST" action="{{route('users.update',$user)}}">
            @csrf
            {{ method_field('PATCH')}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" />
                @if($errors->has('name'))
                <div class="text-danger">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" disabled>
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
            <div class="form-group">
                <label for="password_confirmation">Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        @endcan
    </div>
</div>
@stop

@section('js')
<script>
    var uploadMessage = document.querySelector('#upload_message')
    var currentAvatar = document.querySelector('#current_avatar')

    function uploadAvatar(event) {
        var avatar = event.target.files[0]
        var formData = new FormData()
        formData.append('avatar', avatar)

        uploadMessage.innerHTML = 'Uploading...'
        axios.post("{{ route('users.uploadAvatar', $user) }}", formData)
            .then(function (response) {
                uploadMessage.innerHTML = 'Success to upload'
                currentAvatar.src = response.data
            })
            .catch(function (error) {
                uploadMessage.innerHTML = 'Fail to upload'
            })
    }

    document.querySelector('#avatar').addEventListener('change', uploadAvatar)
</script>
@stop