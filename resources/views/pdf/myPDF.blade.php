<!DOCTYPE html>

<style>

table {
    border-left: 2px solid black;
    border-right: 0;
    border-top: 2px solid black;
    border-bottom: 0;
    border-collapse: collapse;
}
table td,
table th {
    padding: 10px;
    border-left: 0;
    border-right: 2px solid black;
    border-top: 0;
    border-bottom: 2px solid black;
}

</style>

<html>
<head>
	<title>calvBooking</title>
</head>
<body>
	<h1>Welcome to calvBooking <br> Thanks for booking with us!</h1>
 
	<p>Hello {{ $user_name ?? 'nombre usuario'}}, thanks for booking with calvBooking, here you will find the details to your stay
    such as the start and end date aswell as some information about your Host. Have fun!</p>
    <br>
    <p>Accomodation name: {{$book_name ?? 'nombre accomodation'}}.<p>
    <p>Accomodation Host: {{$book_host ?? 'nombre host'}}.</p>
    <p>Accomodation contact: {{$book_contact ?? 'correo del host'}}.</p>
    <p>Direction: {{$book_direction}}</p>
    <p>Booked from  {{$book_start ?? 'hoy'}} to {{$book_end ?? 'mañana'}}.</p>
   

<br><br><br>
    <table>

  <tr>
    <th>Price per night</th>
    <td>{{$book_price ?? '220'}}€</td>
  </tr>


  <tr>
    <td>Booked for {{$book_days ?? '30'}} nights</td>
    <td>{{$final_price ?? 'presio'}}€</td>
  </tr>

</table>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

 <img src="./svg/signature.jpg" width="50%">  <?php echo date("d/m/Y"); ?> Mike mike, calvServices CEO 


    
</body>
</html>