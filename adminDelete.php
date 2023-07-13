<!-- Kukka pg1-3 -->

<?php require 'config.php'; ?>
<?php 
        if(isset($_GET['admin_id'])) {

         	$admin_id = $_GET['admin_id'];

         	$sql = "DELETE from admin WHERE Admin_ID = '$admin_id'";

         	$result = mysqli_query($conn, $sql);

         	if($result) {
         		header('Location: admindash.php?user_modified=true');
         	} else {
         		die(mysqli_error($conn));
         	}
        }
?>