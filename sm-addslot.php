<!-- Sithu pg3-2 -->

<?php
   include 'config.php';
   if(isset($_POST ['submit']) ){
    $type=$_POST['type'];
    $price=$_POST['price'];
    $status=$_POST['status']; 

    $sql="INSERT INTO parkingslots (Type, Price, Status) VALUES('$type','$price', '$status')";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "Data inserted successfully";
        header('location:sm-display.php');
    }else{
        die(mysqli_error($conn));
    }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slot Management</title>
    <link rel="stylesheet" href="css/ps-style.css">
</head>
<body>
    <div class="container">
        <div class="row">
                <div class="bc-div">
                <a class="bc-btn" href="sm-display.php">Back</a>
                </div>
                <h1>Add Details</h1>
                
        </div>
        <form  method="post" action="sm-addslot.php" class="all">
            <div class="form">
                <label >Vehicle Type</label>
                <select name="type" class="slct-form">
                <option value="">Select vehicle type</option>
                    <option value="Car">Car</option>
                    <option value="Van">Van</option>
                    <option value="Bus">Bus</option>
                    <option value="Lorry">Lorry</option>
                    <option value="Motorbike">Motorbike</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form">
                <label >Price</label>
                <input type="bouble" name="price" placeholder="Enter price" class="form-add">
            </div>
            <div class="form">
                <label >Status</label>
                <input type="text"  name="status" placeholder="Enter your status" class="form-add">
            </div>
            <br>
            <button type="submit" name="submit" class="sub-btn">Submit</button>
        </form>
    </div>
</body>
</html>