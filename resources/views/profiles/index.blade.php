@extends('layouts.app')

@section('content')
<div class="container">
 
    <div class="row">

    <div class="col-md-3  table-bordered">

    <div class="pt-4 pr-4 pl-4 pb-2">
        <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
    </div>
        <div class="pt-0 pl-2 pb-3">
        <hr>
                <div class=""><strong>{{$user->posts->count()}}</strong> Accomodations</div>
                <div class="pt-2"><strong>{{$user->profile->followers->count()}}</strong> People recommend</div>
                <div class="pt-2"> Joined in   <div class="font-weight-bold d-inline">  {{$data}}</div> </div>
            </div>

        </div>

        <div class="col-9  pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                
                    <div class="h1"> Hola soy {{$user->username}}</div>
                 

                </div>

            @can('update', $user->profile)
            <a href="/p/create">Add new accommodation</a>
           @endcan
            </div>
           @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit profile</a>
           @endcan
           
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <p class="pt-2" style="word-wrap: break-word"> {{$user->profile->description}}</p>
            
            <div class="pt-1"><a href="{{$user->profile->url}}">{{$user->profile->url}}</a></div>

        <div class="pt-5">
              <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>

        </div>

        </div>
    </div>

    <div class="row pt-5">
       @foreach($user->posts as $post)
       <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" class="w-100">
            </a>
        </div>
       @endforeach

    </div>

</div>
@endsection
