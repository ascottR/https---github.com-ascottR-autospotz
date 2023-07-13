<!-- Sali pg1-1 -->

<?php
session_start();

include_once 'config.php';

if(isset($_POST['uname']) && isset($_POST['psw'])){
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    $query = "SELECT * FROM admin WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $row['Admin_ID'];
        header("Location: admindash.php");
        exit();
    }else{
        $query = "SELECT * FROM users WHERE Username = '$username' AND Password = '$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['Username'] = $row['Username'];
            $_SESSION["First_Name"] = $row["First_Name"];
            $_SESSION["User_ID"] = $row['User_ID'];
            header("Location: userdash.php");   
            exit();
        }else{
            echo "No User found in database";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reglog.css">
    </head>
    <body>
        <div class="container">
            <form action="" method="post">
                <label for="uname">Username</label>
                <input type="text" id="uname" name="uname" required>
        
                <label for="psw">Password</label>
                <input type="password" id="psw" name="psw" required>
        
                <button type="submit">Login</button>
            </form>
            <label>Don't you have an account?</label>
            <button onclick="window.location.href='Register.php'" class="reg-button">Register</button>
        </div>
    </body>
</html>

