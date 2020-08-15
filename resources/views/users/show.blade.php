@extends('layouts.default')]

@section('content')
<section class="post-status">
    <div class="row">
        <div class="form col-md-6 ">
            <div class="form-group">
                <textarea class="form-control" placeholder="Post your blog here!" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2 float-right">Post</button>
        </div>
        <div class="">
            @include('shared._user_inf')
        </div>

    </div>

</section>

<section class="statuses">
    <ul class="list-unstyled">
        @foreach($statuses as $status)
        @include('statuses.status',['user'=>$status->user])
        @endforeach
    </ul>
    {{ $statuses->links() }}
</section>
@stop