@extends('layouts.app')

@section('content')
<div class="container">
 
 <form action="/b" enctype="multipart/form-data" method="post">
  @csrf

    Reservar de <input type="date" name="start_date">
    a <input type="date" name="end_date" >
    <input type="text" name="post_id" value="<?php echo $_GET['post'] ?>" style="display: none"> 
    <input type="submit">

</form>

</div>
@endsection
