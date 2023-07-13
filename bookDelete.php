<!-- Tehan pg1-2 -->

<?php
include_once 'config.php';
session_start();

if(isset($_SESSION['bookingID'])){
    $id = $_SESSION['bookingID'];

    $query = "DELETE FROM bookings WHERE Booking_ID = $id";
    $result = mysqli_query($conn, $query);

    if($result){
        header('location: userdash.php ');
    } else{
        die(mysqli_error($conn));
    }
}
?>
