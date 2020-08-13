<h4>Hello,{{$user->name}}</h4>
<p>Thanks for registering in our Website!</p>
<p>Please verify your account by clicking the following link:<a class=""
        href="{{ route('users.activate', $user->activation_token)}}">{{ route('users.activate', $user->activation_token)}}</a>
</p>