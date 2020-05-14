<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use PDF;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        

        $new_book = Booking::latest()->first();
            
        /*Pdf*/
        
        $data = [
            
            'user_name' => auth()->user()->name,
            'book_name' => $new_book->post->caption,
            'book_host' => $new_book->post->user->username,
            'book_contact' => $new_book->post->user->email,
            'book_start' => $new_book->start_date,
            'book_end' => $new_book->end_date
        ];

        $pdf = PDF::loadView('pdf\myPDF', $data);
  
        return $pdf->download('calvBooking.pdf');

        /*endPdf*/
    
    }

    public function view(){

        return view('pdf/myPDF');
    }
}       