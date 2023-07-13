<!-- Sithu pg3-4 -->

<?php
include 'config.php';
if(isset($_GET['deleteid'])){
    $slotid=$_GET['deleteid'];

    $sql="delete from parkingslots where slotID=$slotid";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "Deleted Successfull";
        header('location:sm-display.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>