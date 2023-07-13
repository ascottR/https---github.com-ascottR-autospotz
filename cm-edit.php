<!-- Sali pg3-2 -->

<?php
   include 'config.php';

   if(isset($_GET['editid'])) {

    $id=$_GET['editid'];

   $sql="SELECT * FROM contact WHERE Msg_ID='$id' ";


   $result=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);

    $name=$row['Name'];
    $email=$row['Email'];
    $message=$row['Message'];


   if(isset($_POST ['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['msg'];
    
    $sql="UPDATE contact SET Name='$name', Email='$email', Message='$message'  WHERE Msg_ID='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "Updated successfully";
        header('location:cm-display.php');
    }else{
        die(mysqli_error($conn));
    }
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts Management</title>
    <link href="css/ps-style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="bc-div">
                <a class="bc-btn" href="cm-display.php">Back</a>
                </div>
                <h1>Edit Details</h1>
                
            
        </div>
         <form method="POST" action="" class="all">
            <div class="form">
                <label >Name</label>
                <input type="text" class="form-add" name="name" placeholder="Enter email" <?php echo 'value="' . $name . '"'; ?>>
            </div>
            <div class="form">
                <label >Email</label>
                <input type="text" class="form-add" name="email" placeholder="Enter email" <?php echo 'value="' . $email . '"'; ?>>
            </div>
            <div class="form">
                <label >Message</label>
                <input type="text" class="form-add" name="msg" placeholder="edit message"  <?php echo 'value="' . $message . '"'; ?>>
            </div>
            <button type="submit" class="sub-btn" name="submit">Edit</button>
        </form>
    </div>
</body>
</html