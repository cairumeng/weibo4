@extends('layouts.default')]

@section('content')


<div class=" text-center">
    @include('shared._user_info',['user'=>Auth::user()])
</div>

@if($statuses->count()>0)
<section class="statuses">
    <ul class="list-unstyled col-md-8 offset-md-2">
        @foreach($statuses as $status)
        @include('statuses.status',['user'=>$status->user])
        @endforeach
    </ul>
    {{ $statuses->links() }}
</section>
@else
<h5>You don't have any blog! Please create one!</h5>
@endif
@stop