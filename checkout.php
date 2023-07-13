<!-- Tehan pg2-1 -->

<?php
include_once 'config.php';
session_start();

// Convert check-in and check-out to timestamps
$checkinTimestamp = strtotime($_SESSION["checkin"]);
$checkoutTimestamp = strtotime($_SESSION["checkout"]);

 // Calculate time difference
 $duration = $checkoutTimestamp - $checkinTimestamp;
 $hours = floor($duration / 3600);
 $minutes = floor(($duration % 3600) / 60);

 $rate = 50; // Rate per hour
 $amount = $hours * $rate;

   // Handle checkout form submission
   if (isset($_SESSION["slot_id"]) && isset($_SESSION["User_ID"])  &&  isset($_POST["checkout_submit"])) {
    // Get form data
    $user_id = $_SESSION["User_ID"];
    $slot_id = $_SESSION["slot_id"];
    $vehicle_type = $_SESSION["vehicle_type"];
    $vehicle_no =  $_SESSION["vehicle_no"];
    $phone_no = $_SESSION["phone_no"];
    $checkin = $_SESSION["checkin"];
    $checkout =  $_SESSION["checkout"];
    $status = "reserved";
    $pay_type = $_POST["Payment_type"];
    

    date_default_timezone_set('Asia/Colombo');
    $currentDateTime = date('Y-m-d H:i:s');

    // Convert check-in and check-out to timestamps
    $checkinTimestamp = strtotime($checkin);
    $checkoutTimestamp = strtotime($checkout);

     // Calculate time difference
     $duration = $checkoutTimestamp - $checkinTimestamp;
     $hours = floor($duration / 3600);
     $minutes = floor(($duration % 3600) / 60);

     $rate = 50; // Rate per hour
     $amount = $hours * $rate;
     
    
    // Insert transaction data
$query = "INSERT INTO payment (User_ID, Payment_Type, Amount, Payment_Date) VALUES ('$user_id','$pay_type','$amount', '$currentDateTime')";
if (mysqli_query($conn, $query)) {
  $pay_id = mysqli_insert_id($conn); // This will get the ID of the last inserted payment
  
  //insert data to bookings table
  $query = "INSERT INTO bookings (User_ID, Slot_ID, Pay_ID, Plate_Number, Phone_No, Check_IN, Check_OUT, Status) VALUES ('$user_id','$slot_id','$pay_id', '{$vehicle_no}', '$phone_no', '$checkin', '$checkout', '$status')";

  if (mysqli_query($conn, $query)) {
    mysqli_close($conn);
    header('Location: userdash.php');
    exit();
  } else {
      // Error inserting transaction data
      echo "Error: " . mysqli_error($conn);
  }  
} else {
    // Error inserting transaction data
    echo "Error: " . mysqli_error($conn);
}
 }
?>

<html>
    <head> 
        <link rel="stylesheet" type="text/css" href="css/checkout-styles.css">
    </head>
    <body>
      
    <div class="content">
       
            <div class ="Checkout"> 
           
                <h2>Checkout Details:</h2><br>
                <label class = "chkout-data">User Name:&nbsp;&nbsp;<span><?php echo $_SESSION['Username']; ?></span></label><br>
                <label>Vehicle Type:<span><?php echo $_SESSION['vehicle_type']; ?></span></label><br>
                <label>Vehicle Number:<span><?php echo $_SESSION['vehicle_no']; ?></span></label><br>        
                <label>Phone Number:&nbsp;<span><?php echo $_SESSION['phone_no']; ?></span></label><br>
                <label>Check-In Date & Time : &nbsp;&nbsp;&nbsp;<span><?php echo str_replace('T', '  :  ', $_SESSION['checkin']); ?></span></label><br>
                <label>Check-Out Date & Time :  <span><?php echo str_replace('T', '  :  ', $_SESSION['checkout']); ?></span></label><br><br>


                <label>Hours:<span><?php echo $hours; ?></span>Minutes:<span><?php echo $minutes; ?> </span></label><br>
                <label>Amount: <span>$ <?php echo $amount; ?></span> </label><br>
            
            <form method="POST" action="" >
            
                <input type="hidden" name="vehicle_type" value="<?php echo $vehicle_type; ?>">
                <input type="hidden" name="vehicle_no" value="<?php echo $vehicle_no; ?>">
                <input type="hidden" name="phone_no" value="<?php echo $phone_no; ?>">
                <input type="hidden" name="checkin" value="<?php echo $checkin; ?>">
                <input type="hidden" name="checkout" value="<?php echo $checkout; ?>">
                <input type="hidden" name="slot_id" value="<?php echo $slot_id; ?>">
                <input type="hidden" name="amount" value="<?php echo $hours * $slot_price; ?>">
                <label for="Payment_type">Choose a Payment type: 
                <select id = "Payment_type" name = "Payment_type">
                  <option value="cash">Cash on Hand</option>
                  <option value="card">card Payment</option> 
                </select>
                
                <div class="btn-container">
                  <button type="button" onclick="window.location.href='userdash.php'">cancel</button>
                  <button type="submit" name="checkout_submit">Confirm</button>  
                </div>          
              </form> 
          </div>
    </div>
  </body>
</html>


