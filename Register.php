<!-- sali pg2-1 -->


<?php
include_once 'config.php';

if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['license_no']) && isset($_POST['phone_no']) && isset($_POST['password'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $license_no = $_POST['license_no'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (First_Name, Last_Name, Username, Email, License_No, Phone_No, Password) VALUES ('$first_name', '$last_name', '$username', '$email', '$license_no', '$phone_no', '$password')";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "Registration successful";
    }else{
        echo "Registration failed";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reglog.css">
    </head>
    <body>
        
     <div class="login-signup">
      <a href="login.php"> <button class="login-btn" >Login</button></a>
     </div>
     
        <div class="container">
            <form action="" method="post">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>

                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>

                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="license_no">License Number</label>
                <input type="text" id="license_no" name="license_no" required>

                <label for="phone_no">Phone Number</label>
                <input type="text" id="phone_no" name="phone_no" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
        
                <button type="submit">Register</button>
            </form>
        </div>
    </body>
</html>
