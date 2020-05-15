<?php

namespace App\Http\Controllers;

use DateTime;
use PDF;
use App\Booking;
use App\Post;
use Illuminate\Http\Request;


class BookingsController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
    }

    public function create(){

        return view('bookings/create');
    }

    public function store(){

        $data = request()->validate([
            'post_id' => '',
            'start_date' => 'required',
            'end_date' => 'required',

        ]);


        $date1 = request('start_date');
        $date2 = request('end_date');

        $parts = explode("-", $date1);
        $order = array($parts[1], $parts[0], $parts[2]);
        $final_start = implode("-", $order);
        $parts = explode("-", $date2);
        $order = array($parts[1], $parts[0], $parts[2]);
        $final_end = implode("-", $order);
        

        function check_in_range($start_date, $end_date, $date_from_user)
        {
       
        $start_ts = strtotime($start_date);
        $end_ts = strtotime($end_date);
        $user_ts = strtotime($date_from_user);

        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
        }

        $post = Post::find(request('post_id'));
        $bookings = $post->bookings;

       $end_dates = [];

       for($i = 0; $i < sizeof($bookings); $i++){

        array_push($end_dates, $bookings[$i]->end_date);
    
       }

      $cheker = false;

       for($i=0; $i<sizeof($end_dates); $i++){

            $date = $end_dates[$i];

            $parts = explode("-", $date);
            $order = array($parts[1], $parts[0], $parts[2]);
            $final_date = implode("-", $order);
         
            if(check_in_range($final_start, $final_end, $final_date)){

                $cheker = true;
            }
       }

       if($cheker){

        return redirect('/p/' . request('post_id'));
       }

        function dateDiffInDays($date1, $date2)  
        { 
            $diff = strtotime($date2) - strtotime($date1); 
            return $diff; 
        } 
     
        $dateDiff = dateDiffInDays($final_start, $final_end); 
          
        

        if($dateDiff > 0){
            
            auth()->user()->bookings()->create($data);   

            $PostsF = Post::find(request('post_id'));
           
            $new_book = $PostsF->Bookings->last();
            
            $user = [
                'name' =>  auth()->user()->name,
                'start' => $new_book->start_date,
                'end' => $new_book->end_date,
                'location' => $PostsF->ubication
            ];
        
            \Mail::to(auth()->user()->email)->send(new \App\Mail\NewMail($user));
         
            return redirect('/b/' . auth()->user()->id);

        }else{
           
            return redirect('/p/' . request('post_id'));
        }


        
       
    

    }

    public function show(){

        return view('bookings/view');
    }

    public function delete(){



        $data = request()->validate([
            'post_id' => '',
        

        ]);

        Booking::destroy($data);
        return redirect('/b/' . auth()->user()->id);
        
    }

    public function print(){

        $data = request()->validate([
            'post_id' => '',
        

        ]);

        
    
        $new_book1 = Booking::find($data);
        $new_book =  $new_book1[0];

        $date1 = $new_book->start_date;
        $date2 = $new_book->end_date;

        $parts = explode("-", $date1);

        $order = array($parts[1], $parts[0], $parts[2]);

        $final_start = implode("-", $order);

        $parts = explode("-", $date2);

        $order = array($parts[1], $parts[0], $parts[2]);

        $final_end = implode("-", $order);
        
        

        function dateDiffInDays($date1, $date2)  
        { 
            $diff = strtotime($date2) - strtotime($date1); 
            return abs(round($diff / 86400)); 
        } 
                
     
        $dateDiff = dateDiffInDays($final_start, $final_end); 
          
    
        $price = (int)$new_book->post->prize;
        $final_price = $price * $dateDiff;
        
        $data = [
            
            'user_name' => auth()->user()->name,
            'book_name' => $new_book->post->caption,
            'book_host' => $new_book->post->user->username,
            'book_contact' => $new_book->post->user->email,
            'book_start' => $final_start,
            'book_end' => $final_end,
            'book_price' => $new_book->post->prize,
            'book_days' => $dateDiff,
            'final_price' => $final_price,
            'book_direction' => $new_book->post->ubication
        ];

        $pdf = PDF::loadView('pdf\myPDF', $data);
        $today = date("d/m/Y");
        $name = 'calvHotelBooking';
        $extension = '.pdf';

        return $pdf->download($name . $today . $extension);
    }

}
