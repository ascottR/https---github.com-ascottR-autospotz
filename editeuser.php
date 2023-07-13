<!-- Kukka pg2-2 -->

<?php require 'config.php'; ?>

<?php
    if(isset($_GET['admin_id'])) {
      $admin_id =  $_GET['admin_id'];
      $sql = "SELECT * FROM admin WHERE Admin_ID = '$admin_id' LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $result_set = mysqli_fetch_assoc($result);

        $Admin_ID =  $result_set['Admin_ID'];
        $Name =  $result_set['Name'];
        $Username = $result_set['Username'];
        $Admin_Email = $result_set['Admin_Email'];
        $Role = $result_set['Role'];
        $Phone_Number = $result_set['Phone_Number'];
        $Password = $result_set['Password'];
        $is_deleted = '';                                   
    }

    if (isset($_POST['submit'])){
     
        $Admin_ID =  $_POST['Admin_ID'];
        $Name =  $_POST['Name'];
        $Username =  $_POST['Username'];
        $Admin_Email = $_POST['Admin_Email'];
        $Role = $_POST['Role'];
        $Phone_Number = $_POST['Phone_Number'];
        $Password = $_POST['Password'];

        $sql = "UPDATE admin SET Name='$Name', Username='$Username', Admin_Email='$Admin_Email',
        Role='$Role', Phone_Number='$Phone_Number', Password ='$Password' WHERE Admin_ID = '$Admin_ID' LIMIT 1";

        $result = mysqli_query($conn, $sql);

        if ($result) {
             // query successful... redirecting to users page
             header('Location: admindash.php?user_modified=true');
        } else {
             $errors[] = 'Failed to modified !...';
          }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edite USer</title>
  <link rel="stylesheet" type="text/css" href="css/add_up.css">
</head>
<body>

    <div class="adminbk">
       <span class="back"><a href="admindash.php">< Back to Admin Dashboard</a></span></div>

        <form method="POST" action="editeuser.php" class="">
          <fieldset class="modifieduser_form">
            <legend class="leg">Update Admin Details</legend>
        
            <p>
              <label>Admin_ID :</label>
              <input type="text" name="Admin_ID" <?php echo 'value="' . $Admin_ID . '"'; ?> >
            </p>

            <p>
              <label>Name :</label>
              <input type="text" name="Name" <?php echo 'value="' . $Name . '"'; ?>>
            </p>

            <p>
              <label>Username :</label>
              <input type="text" name="Username" <?php echo 'value="' . $Username . '"'; ?>>
            </p>

           <p>
             <label>Admin_Email :</label>
             <input type="text" name="Admin_Email" <?php echo 'value="' . $Admin_Email . '"'; ?>>
           </p>

           <p>
             <label>Role :</label>
             <input type="text" name="Role" <?php echo 'value="' . $Role . '"'; ?>>
           </p>

           <p>
             <label>Phone_Number :</label>
             <input type="text" name="Phone_Number" <?php echo 'value="' . $Phone_Number . '"'; ?>>
          </p>

          <p>
            <label>Password :</label>
            <input type="password" name="Password" <?php echo 'value="' . $Password . '"'; ?>>
          </p>
          <button type="submit" class="save_modifieduser" name="submit">Save</button>
          <button type="reset" class="reset_modifieduser">Reset Form</button>
        </fieldset>
      </form>
    </div>
</body>
</html>