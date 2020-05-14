<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>



    <!-- Scripts -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                   <div> <img src="/svg/hotel.svg" style="height: 35px; border-right: 1px solid black" class="pr-3"></div>
                   <div class="pl-3 pt-1">CalvBooking</div>
                </a>
                

                <div class="" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                           
                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a href="/profile/{{ Auth::user()->id }}" class="dropdown-item dropdown-menu-right">{{ Auth::user()->username }}</a>
                                   
                                    <a href="/b/{{ Auth::user()->id }}" class="dropdown-item dropdown-menu-right">Bookings</a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                               
                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container">
    <div class="row">
        <div class="col-4">
        
            <img src="/storage/{{$post->image}}" class="w-100">
            
        </div>
        <div class="col-8">
            <div>
            <div class="d-flex p-2 align-items-center">
                 
                    <div>
                        <div class="font-weight-bold  ">
                              
                                 <h2> <span class="font-weight-bold">{{$post->caption}}</h2></span>
                         </div>
                    </div>
                    <a href="/profile/{{$post->user->id}}"> 
                    <div class="p-2 ml-auto  "><img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 60px">
                    <div class="pt-2 pl-2"> {{$post->user->username}}  </a> </div> </div>
                  
                    </div>
               
                <hr>              
               
            </div>

                <div class="pl-2">

                   {{$post->ubication}}
                   <br>
                   {{$post->type}}
                  <span class="font-weight-bold">  {{ $post->prize . ' €'}} per night  </span>
                 <div class="pt-2" >     {{$post->description}}</div>
              
                </div>

        </div>
    </div>
 
    <div class="row mt-5">

<div class="m-auto" style="display: none"> <a href="/b/create?post={{$post->id}}">Reservar</a></div>

<div class="ml-3 mb-3 ">
<form autocomplete="off" action="/b" enctype="multipart/form-data" method="post">
  @csrf
    Book from <input class="date form-control" name="start_date" readonly type="text">     
    to <input class="date form-control" name="end_date" readonly type="text">
    <input type="text" name="post_id" value="{{$post->id}}" style="display: none"> 

    <div class="container">

</div>

    <button type="submit" class="btn btn-primary mt-3" onClick="window.location.reload();" >Book</button>

</form>
</div>

<div class="ml-4">
            <div class="mt-3"> <h1>Book your stay right now!</h1> </div>

<script>var fechas = []; </script>

                @foreach($post->bookings as $booking)
                
                <script>
                
                fechas.push(new Date('{{$booking->start_date}}'));
                fechas.push(new Date('{{$booking->end_date}}'));
                
                </script>

                @endforeach
         </div>

    </div>

  



<script type="text/javascript">



$('.date').datepicker({
    //..
    todayHighlight : true,
    startDate : new Date(),
    format: 'mm-dd-yyyy',
    clearBtn : true,
    beforeShowDay: function(date) {
        suma = 0
        for(var i = 0; i < fechas.length; i++){

        if (date >= fechas[i+suma]  && date <= fechas[i+suma+1]) {
           
            return false;
        
         }
        
         suma = suma +1;
       }
    }

    
}).on('changeDate', function(e) {
    console.log(e.format());
    

});

</script>  


</div>

        </main>
    </div>
</body>
</html>

 


