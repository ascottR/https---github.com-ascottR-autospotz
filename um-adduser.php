<!-- Kaniska pg4-2 -->
<?php
include 'config.php';

if(isset($_POST['submit'])){
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $License_No = $_POST['License_No'];
    $Phone_No = $_POST['Phone_No'];
    $Password = $_POST['Password'];

    $sql = "INSERT INTO `users` (First_Name, Last_Name, Username, Email, License_No, Phone_No, Password) 
            VALUES ('$First_Name', '$Last_Name','$Username','$Email', '$License_No', '$Phone_No', '$Password')";

    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:um-display.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Form</title>
    <link rel="stylesheet" href="css/addupdate.css">
    <link rel="stylesheet" href="sbutton.css">
</head>
<body>
    <div class="form">
        <form method="post" action="um-adduser.php">
            <label for="name">First Name:</label>
            <input type="text" name="First_Name" id="First_Name" placeholder="Enter your name">
            <br>
            <label for="Last_Name">Last Name:</label>
            <input type="text" name="Last_Name" id="Last_Name" placeholder="Enter your Last Name">
           <br>
            <label for="Username">Userame:</label>
            <input type="text" name="Username" id="Username" placeholder="Enter username">
            <br>
            <label for="Email">E-mail:</label>
            <input type="Email" name= "Email" id="Email" placeholder="Enter your Email">
            <br>
            <label for="phone">Phone:</label>
            <input type="text" name="Phone_No" id="Phone_No" placeholder="Enter your Phone_No">
            <br>
            <label for="License_No">License_No:</label>
            <input type="text" name="License_No" id="License_No" placeholder="Enter your License_NO" required>
            <br>
            <label for="Password">Password:</label>
            <input type="Password" name="Password" id="Password" placeholder="Enter your Password">
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
