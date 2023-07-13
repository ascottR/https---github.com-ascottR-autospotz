<!-- Kaniska pg4-4 -->


<?php
    include 'config.php';
    
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql = "DELETE from `users` WHERE User_ID = $id";
        $result=mysqli_query($conn , $sql);
        if($result){
            //echo "Deleted successfully";
            header('location:um-display.php');
        }else{
            die(mysqli_error($conn));
        }

    }

?>