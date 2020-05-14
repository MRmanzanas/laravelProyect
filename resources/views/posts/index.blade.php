@extends('layouts.app')

@section('content')



<div class="container ">
<div class="m-5 w-75 d-flex align-content-center text-secondary ">

    <h1>Welcome to calvBooking your favourite comunity when it comes to booking places to stay wherever you go  from wherever you come.</h1>
  
</div>
<br>
<br>
    @foreach($posts as $post)
    <div class="row puntero d-flex" style=" cursor:pointer;" onclick="location.href='/p/{{$post->id}}';">
    
        <div class="col-3 border-darken-4 img-fluid">
            <a href="/p/{{$post->id}}">
            <img src="/storage/{{$post->image}}" class="w-75">
            </a>
        </div>

        <div class="col-9">
        
            <div class="pt-4"> <h4>{{$post->caption}}</h2> </div>
            <div class="pt-3"> <span class="font-weight-bold">{{$post->ubication}} </span></div>
            
            
            <div class="d-flex justify-content-between align-items-baseline" style=" cursor:pointer;">
                <div class="d-flex align-items-center">
                {{$post->type}}
                </div>
            <div class="font-weight-bold">{{$post->prize}}€ <div class="d-inline">per night</div> </div>
            </div>
          </div> 
        </div>
       
            <br>
               <hr style="height:2px; ;border-width:0;color:gray;background-color:rgb(255, 94, 137) ">
         <br>
        
  
    @endforeach
    
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{  $posts->links() }}
        </div>
    </div>
   
</div>
@endsection
