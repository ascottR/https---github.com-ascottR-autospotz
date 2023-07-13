<!-- Tehan pg2-1-->


<?php
    session_start();
    include_once 'config.php';
    $username = $_SESSION['Username'];
    $firstName = "";
    $lastName = "";
    $email = "";
    $licenseNo = "";
    $phoneNo = "";

    if( isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['Uname']) && isset($_POST['Email']) && isset($_POST['Phn-No'])) {
        // Retrieve the form inputs
        $newUserName = $_POST['Uname'];
        $newFirstName = $_POST['firstName'];
        $newLastName = $_POST['lastName'];
        $newEmail = $_POST['Email'];
        $newPhoneNo = $_POST['Phn-No'];

        $query = "UPDATE users SET First_Name = '$newFirstName', Last_Name = '$newLastName', Username = '$newUserName', Email = '$newEmail', Phone_No = '$newPhoneNo' WHERE Username = '$username'";
        $updateResult = mysqli_query($conn, $query);

        $firstName = $newFirstName;
        $lastName = $newLastName;
        $email = $newEmail;
        $phoneNo = $newPhoneNo;
        $_SESSION['Username'] = $newUserName;
        $username = $newUserName;
    }
 
    $query = "SELECT * FROM users WHERE Username = '$username'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['First_Name'];
        $lastName = $row['Last_Name'];
        $email = $row['Email'];
        $licenseNo = $row['License_No'];
        $phoneNo = $row['Phone_No'];
    } else {
        echo "User not found.";
    }

    if (isset($_POST['currentPass']) && isset($_POST['newPass']) && isset($_POST['conPass'])) {
        // Retrieve the form inputs
        $prvPassword = $_POST['currentPass'];
        $newPassword = $_POST['newPass'];
        $confirmPassword = $_POST['conPass'];
        
        if($newPassword !== $confirmPassword){
            echo "New Password and Confirm Password do not match";
        } else {
            if($prvPassword === $row['Password']){
                $query = "UPDATE users SET Password = '$newPassword' WHERE Username = '$username'";
                $updateResult = mysqli_query($conn, $query);
                
                if ($updateResult) {
                    echo "Password updated successfully.";
                } else {
                    echo "Error updating password.";
                }
            } else {
                echo "Previous Password is incorrect";
            }
        }
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
            <fieldset class="user-details">
                <h2>Personal Details:</h2>
                <br>
                <div class="detail-row">
                    <label>User Name: </label><span><?php echo $username; ?></span>
                </div>
                <div class="detail-row">
                    <label>First Name: </label><span><?php echo $firstName; ?></span>
                </div>
                <div class="detail-row">
                    <label>Last Name: </label><span><?php echo $lastName; ?></span>
                </div>
                <div class="detail-row">
                    <label>Email: </label><span><?php echo $email; ?></span>
                </div>
                <div class="detail-row">
                    <label>License No: </label><span><?php echo $licenseNo; ?></span>
                </div>
                <div class="detail-row">
                    <label>Phone No: </label><span><?php echo $phoneNo; ?></span>
                </div>
                <br>
                <div class="detail-row buttons">
                    <button onclick="openPopup('udPopup')">Edit Profile</button>
                    <button onclick="openPopup('npPopup')">Change Password</button> 
                </div>
            </fieldset>

            
            <div id = "npPopup"> 
                <form action="" method="post">
                    <fieldset>
                        <legend>New password</legend>
                        <input type ="password" name = "currentPass" placeholder = "Previous Password" ><br><br>
                        <input type ="password" name = "newPass" placeholder = "New Password" ><br><br>
                        <input type ="password" name = "conPass" placeholder = "Confirm Password" >
                        <button type ="button" onclick = "closePopup('npPopup')" >close</button>
                        <button type ="submit" >confirm</button><br> 
                    </fieldset>
                </form>  
            </div>
            <div id = "udPopup"> 
                <form action="" method="post">
                    <fieldset>
                        <legend>Change User details</legend>
                        <input type ="text" name = "Uname" value = "<?php echo $_SESSION['Username']; ?>" ><br><br>
                        <input type="text" name="firstName" value="<?php echo $row['First_Name']; ?>" ><br><br>
                        <input type="text" name="lastName" value="<?php echo $row['Last_Name']; ?>" ><br><br>
                        <input type ="text" name = "Email" value = "<?php echo $row['Email']; ?>" ><br><br>
                        <input type ="text" name = "Phn-No" value = "<?php echo $row['Phone_No']; ?>" ></br>
                        <button type ="button" onclick = "closePopup('udPopup')" >Close</button>
                        <button type ="submit" >Save Details</button><br> 
                    </fieldset>
                </form>  
            </div>
        </div> 
        <!-- Footer section-->
        <footer>
            <p>ALL RIGHTS RESERVED | <a href="tnc.html">TERMS & CONDITIONS<a> </p>
        </footer>
    </body>
</html>

<!--show and hide popup -->
<script>
    function openPopup(id) {
      document.getElementById(id).style.display = "flex";
    }
    
    function closePopup(id) {
      document.getElementById(id).style.display = "none";
    }
</script>