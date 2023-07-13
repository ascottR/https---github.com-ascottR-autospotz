<!-- Tehan pg4-1-->

<?php
    session_start();
    include_once 'config.php';
    
    // Fetch booking details for ongoing and reservation bookings
    $query = "SELECT * FROM bookings WHERE Status = 'closed' ";
    $result = mysqli_query($conn, $query);
    
    // Check if any bookings were found
    if ($result && mysqli_num_rows($result) > 0) {
        // Prepare the data for the HTML template
        
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
    } else {
        echo "No Previous bookings found.";
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
                 <?php echo "<strong>Hello </strong> ".$_SESSION['Username']; ?>
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
        <h2>Booking-History</h2>
        <table>
            <tr>
                <th>Booking ID</th>
                <th>Vehicle NO</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
            </tr>       
            <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?php echo $booking['bookingID']; ?></td>
                <td><?php echo $booking['vehicleNo']; ?></td>
                <td><?php echo date('Y-m-d H:i', strtotime($booking['bookingStartTime'])); ?></td>
                <td><?php echo date('Y-m-d H:i', strtotime($booking['bookingEndTime'])); ?></td>
                <td><?php echo $booking['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <!-- Footer section-->
        <footer>
           <p>ALL RIGHTS RESERVED | <a href="tnc.html">TERMS & CONDITIONS<a> </p>
        </footer>
    </body>
</html>

