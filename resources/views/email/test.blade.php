<!DOCTYPE html>
<html>
<head>
  
</head>
<body>
    <h1>Booking confirmation</h1>
    <p>Hello {{ $user['name'] }}</p>
    <p>Thank you for booking your stay with calvBooking, here you have the relevant information about it.</p>
    <p>Start date {{ $user['start'] }}, End date {{ $user['end'] }} </p>
    <p>Booking location: {{ $user['location'] }}</p>
    <br>
    <p></p>
</body>
</html> 