<!-- Tehan pg1-1 -->

<?php
    session_start();
    
    include_once 'config.php';
    $bookings = [];

     // Get the current date and time
     date_default_timezone_set('Asia/Colombo');
     $currentDateTime = date('Y-m-d H:i');

    // Update the booking status to "ongoing" form "reserved"
    $query = "UPDATE bookings SET Status = 'on going' WHERE Check_IN <= '$currentDateTime' AND Status = 'reserved'";
    $result = mysqli_query($conn, $query);

    // Update the booking status to "closed" 
    $query = "UPDATE bookings SET Status = 'closed' WHERE Check_OUT <= '$currentDateTime' AND Status = 'on going'";
    $result = mysqli_query($conn, $query);

    //get booking details of ongoing and reserved bookings
    $query = "SELECT * FROM bookings WHERE Status = 'on going' OR Status = 'reserved' ";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {

           // Loop through the rows and display the booking details      
            while ($row = mysqli_fetch_assoc($result)) {
                $bookingID = $row['Booking_ID'];
                $vehicleNo = $row['Plate_Number'];
                $bookingStartTime = $row['Check_IN'];
                $bookingEndTime = $row['Check_OUT'];
                $status =  $row['Status'];
        
                $bookings[] = [
                    'bookingID' => $bookingID,
                    'vehicleNo' => $vehicleNo,
                    'bookingStartTime' => $bookingStartTime,
                    'bookingEndTime' => $bookingEndTime,
                    'status' => $status
                ];
            }
    } 
    
       // Handle parking booking form submission
       if (isset($_POST["book_submit"]) ){
        // Get form data
        $vehicle_type =  $_POST["vehicle_type"];
        $vehicle_no =  $_POST["vehicle_no"];
        $phone_no = $_POST["phone_no"];
        $checkin =  $_POST["checkin"];
        $checkout = $_POST["checkout"];
        
        // Check for available parking slots
        $query = "SELECT COUNT(*) as num_booked 
        FROM bookings b , parkingslots p 
        WHERE b.Slot_ID = p.slotID
        AND p.Type = '$vehicle_type'
        AND p.Status = 'Active'
        AND ((b.Check_IN <= '$checkin' AND b.Check_OUT >= '$checkin')
        OR (b.Check_IN <= '$checkout' AND b.Check_OUT >= '$checkout')
        OR (b.Check_IN >= '$checkin' AND b.Check_OUT <= '$checkout')
        OR (b.Check_IN <= '$checkin' AND b.Check_OUT >= '$checkout')) ";

        $result = mysqli_query($conn, $query);
  
        if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $num_slots = $row['num_booked'];
          //change the values according to parking slot types
          if ($vehicle_type === 'car' &&  $num_slots >= 2 || $vehicle_type === 'van' && $num_slots >= 2) {
              echo "Car parking slots are fully booked.$num_slots. $vehicle_type";
          }else{
              // Available parking slots, display checkout form //TODO: theres need an update in the following sql code
              $query = "SELECT p.* FROM parkingslots p WHERE p.Type = '$vehicle_type' AND p.Status = 'active' AND p.slotID NOT IN (
                SELECT b.Slot_ID FROM bookings b WHERE (
                    (b.Check_IN <= '$checkin' AND b.Check_OUT >= '$checkin') 
                    OR (b.Check_IN <= '$checkout' AND b.Check_OUT >= '$checkout') 
                    OR (b.Check_IN >= '$checkin' AND b.Check_OUT <= '$checkout')
                    OR (b.Check_IN <= '$checkin' AND b.Check_OUT >= '$checkout')
                )
            ) LIMIT 1";
                          $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_assoc($result);
              $_SESSION["slot_id"]= $row["slotID"];
              $_SESSION["vehicle_type"] = $vehicle_type;
              $_SESSION["vehicle_no"] = $vehicle_no;
              $_SESSION["phone_no"] = $phone_no;
              $_SESSION["checkin"] = $checkin;
              $_SESSION["checkout"] = $checkout;
              echo "Parking slots are available for $vehicle_type <br>";  
              header('Location: checkout.php');
              exit();
          }
        } else {
          $query = "SELECT * FROM parkingslots WHERE Type = '$vehicle_type' AND Status = 'active' LIMIT 1";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $_SESSION["slot_id"]= $row["slotID"];
          $_SESSION["vehicle_type"] = $vehicle_type;
          $_SESSION["vehicle_no"] = $vehicle_no;
          $_SESSION["phone_no"] = $phone_no;
          $_SESSION["checkin"] = $checkin;
          $_SESSION["checkout"] = $checkout;
          echo "Parking slots are available for $vehicle_type <br>";  
          header('Location: checkout.php');
          exit();        }
       } 
?>


<html>
    <head> 
        <link rel="stylesheet" type="text/css" href="css/ud-styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>
    <body>
        <div class="sidebar">
            <div class="logo-container">
                <img src="images/logo1.png" alt="logo" class="logo">
            </div>
            <div class="welcome-message">
                 <?php echo "<strong>Hello </strong> ".$_SESSION["First_Name"]; ?> <!--TODO:display fristname-->
            </div>
            <ul>
                <li><a href="userdash.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                <li><a href="userprofile.php"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="bookinghistory.php"><i class="fas fa-history"></i>Booking History</a></li>
            </ul>
            <div class="bottom-links">
                <ul>
                    <li class="help"  ><a href="FAQ.html"><i class="fas fa-question-circle"></i>Help</a></li>
                    <li class="logout" ><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
                </ul>
            </div>
        </div>
    
    <div class="ud-content">
        <h2>Booking</h2>
        <form method="POST" action="">
          <div class = "book-data">
            <label for="vehicle_type">Choose a vehical type:</label>
            <select id = "vehicle_type" name = "vehicle_type">
                <option value="car">car</option>
                <option value="van">van</option>            
            </select> 
          </div> 
          <div class = "book-data">
            <label for="vehicle_No">Enter the vehical No:</label>
            <input type ="text" name = "vehicle_no" required>
          </div>
          <div class = "book-data">
            <label for="phone_No">Enter the phone No:</label>
            <input type ="text" name = "phone_no" required>
          </div>
          <div class = "book-data">
            <label for="checkin$checkout">Enter checkin:</label>
            <input type="datetime-local" id="checkin" name="checkin" required>
            <label for="checkin$checkout">   checkout:</label>
            <input type="datetime-local" id="checkout" name="checkout" required>
          </div>
          <div class = "book-btn">
            <button type="reset" >Cancel</button>
            <button type="submit" name="book_submit" id="book-btn" >Book</button>
          </div>
        </form>

        <h2>Recent bookings</h2>
        <label> Current date and time : <?php echo $currentDateTime ?></label>
        <table>
            <tr>
                <th>Booking ID</th>
                <th>Vehicle NO</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>Operation</th>
            </tr>
            <?php 
           if (is_array($bookings)) {
            foreach ($bookings as $booking): 
            ?>
            <tr>
                <td><?php echo $booking['bookingID'];
                          $_SESSION['bookingID'] = $booking['bookingID']; 
                ?></td>
                <td><?php echo $booking['vehicleNo']; ?></td>
                <td><?php echo date('Y-m-d H:i', strtotime($booking['bookingStartTime'])); ?></td>
                <td><?php echo date('Y-m-d H:i', strtotime($booking['bookingEndTime'])); ?></td>
                <td><?php echo $booking['status']; ?></td>
                <td> 
                    <button class = "cancel-btn"><a href = "bookDelete.php?deleteid= '.<?php $booking['bookingID']?>.' ">Cancel</a></button> 
                </td>
            </tr>
            <?php
            endforeach;

            } 

            ?>
        </table>  
    </div>

    <!-- Footer section-->
    <footer>
        <p>ALL RIGHTS RESERVED | <a href="tnc.html">TERMS & CONDITIONS<a> </p>
    </footer>

    </body>

</html>
