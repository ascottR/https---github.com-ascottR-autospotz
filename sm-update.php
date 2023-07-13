<!-- Sithu pg3-3 -->

<?php
   include 'config.php';

   if(isset($_GET['updateid'])) {

    $id=$_GET['updateid'];

   $sql="SELECT * FROM parkingslots WHERE slotID='$id' ";


   $result=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);

    $type=$row['Type'];
    $price=$row['Price'];
    $status=$row['Status'];


   if(isset($_POST ['submit'])){
    $type=$_POST['Type'];
    $price=$_POST['Price'];
    $status=$_POST['Status'];
    
    $sql="UPDATE parkingslots SET Type='$type',Price='$price', Status='$status'  WHERE slotID='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "Updated successfully";
        header('location:sm-display.php');
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
    <title>Slot Management</title>
    <link href="css/ps-style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="bc-div">
                <a class="bc-btn" href="sm-display.php">Back</a>
                </div>
                <h1>Update Details</h1>
                
            
        </div>
         <form method="POST" action="" class="all">
            <div class="form">
                <label >Vehicle Type</label>
                <select name="Type" class="slct-form">
                    <option value="<?php
                echo '$type';?>"><?php
                echo '$type';?></option>
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
                <input type="double" class="form-add" name="Price" placeholder="Enter price" <?php echo 'value="' . $price . '"'; ?>>
            </div>
            <div class="form">
                <label >Status</label>
                <input type="text" class="form-add" name="Status" placeholder="Enter your mobile number"  <?php echo 'value="' . $status . '"'; ?>>
            </div>
            <button type="submit" class="sub-btn" name="submit">Update</button>
        </form>
    </div>
</body>
</html