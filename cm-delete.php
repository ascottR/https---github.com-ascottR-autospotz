<!-- Sali pg3-3 -->

<?php
include 'config.php';
if(isset($_GET['deleteid'])){
    $ID=$_GET['deleteid'];

    $sql="delete from contact where Msg_ID=$ID";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "Deleted Successfull";
        header('location:cm-display.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>