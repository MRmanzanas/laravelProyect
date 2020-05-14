@extends('layouts.app')

@section('content')

<div class="container">
 

 
    <div>
    
    You have {{Auth::user()->bookings->count()}} bookings:
    <br>

    @foreach(Auth::user()->bookings->sortBy('start_date'); as $booking)
    
<div class="mt-3">
<form action="/b/{user}/delete" method="post">
@csrf
    From 
    {{$booking->start_date }}
    To
    {{$booking->end_date }}
    In
   <a href="/p/{{$booking->Post->id}}">{{$booking->Post->caption }}</a> 

   <input type="text" value="{{$booking->id}}" name="post_id" class="d-none">

    <div class="dropwon d-inline ml-3">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Manage
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

        <input type="submit" class="btn btn-link ml-2" value="Cancel">
        </form>
        <br>

        <form action="/b/{user}/print" method="post">
        @csrf
            <input type="text" value="{{$booking->id}}" name="post_id" class="d-none">
            <input type="submit" class="btn btn-link ml-2 mb-2" value="Donwload bill">   
        </form>

   
            
        </div>
    </div>

  
  
    <br>

    
</div>

    @endforeach

    </div>

</div>
@endsection