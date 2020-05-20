@extends('layouts.app')

@section('content')



<div class="container ">

<div class="m-5 w-75 d-flex align-content-center text-secondary" >

    <h1>Welcome to calvBooking your favourite comunity when it comes to booking places to stay wherever you go  from wherever you come.</h1>
  
</div>

<div class="row">

    <div class="col-4">
    <div class="card text-white bg-secondary mb-3" style="">
                <img class="card-img-top" src="/svg/bs1.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Spain</h5>
                                       
                    <p class="card-text"> Take a look at the Spain landscape, who wouldn't want to go there?</p>                  
                </div>
        </div>
    </div>


    <div class="col-4">
    <div class="card text-white bg-secondary mb-3" style="">
                <img class="card-img-top" src="/svg/bs2.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Italy</h5>
                    <p class="card-text">Lets be real here, who doesnt like Italy? Dont wait longer!</p>
                </div>
        </div>
    </div>

    <div class="col-4">   
        <div class="card text-white bg-secondary mb-3" style="">
                <img class="card-img-top" src="/svg/bs4.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Some random place</h5>
                    <p class="card-text">I dont remember where this is from, but it looks amazing!</p>  
                </div>
        </div>
    </div>

</div>


<div class="m-5 w-75 d-flex align-content-center text-secondary" >

    <h1>From apparments to studios, get what you need where you need!</h1>
  
</div>


<div class="row">

<div class="col-6">


<div class="card w-100">
  <div class="card-body">
    <h5 class="card-title">Discover the world with calvBooking</h5>
    <p class="card-text">There a lot of places out there waiting to be seen by people like you, and calvBooking is the best way to go.</p>
    </div>
  <img src="/svg/fondo.jpg" style="width: 100% height: 50%" class="card-img-top" alt="...">
</div>



</div>

<div class="col-6">

<div class="card mb-3 w-100">
  <img src="/svg/bs3.jpeg" style="width: 100% height: 50%" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">There is always a place to go</h5>
    <p class="card-text">The world is huge and the opportunities endless, explore it the way you enjoy the most and let us worry about the boring stuff.</p>
  </div>
</div>
</div>
</div>


<div class="m-5 w-80 d-flex align-content-center text-secondary" >

    <h1>Here you have all of the places your next adventure will take place, just click in
    the one you would like to book a stay, select the dates and you are good to go!</h1>
  
</div>
<br>
    @foreach($posts as $post)
    <div class="row puntero d-flex" style=" cursor:pointer;" onclick="location.href='/p/{{$post->id}}';">
    
        <div class="col-3 border-darken-4 img-fluid">
            <a href="/p/{{$post->id}}">
            <img src="/storage/{{$post->image}}" class="w-100">
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
