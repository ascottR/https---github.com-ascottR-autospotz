<!-- Kukka pg1-2 -->

<?php require 'config.php'; ?> 

 <?php
    
    if (isset($_POST['submit'])){

      $Admin_ID =  $_POST['Admin_ID'];
      $Name =  $_POST['Name'];
      $Username =  $_POST['Username'];
      $Admin_Email = $_POST['Admin_Email'];
      $Role = $_POST['Role'];
      $Phone_Number = $_POST['Phone_Number'];
      $Password = $_POST['Password'];

      $sql = "INSERT INTO admin VALUES ('$Admin_ID', '$Name', '$Username', '$Admin_Email', '$Role', '$Phone_Number', '$Password', '0')";

      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo "Suc data enter";
        // query successful... redirecting to users page
        header('Location: admindash.php?user_added=true');
      } else {
        $errors[] = 'Failed to add the new record.';
      }
 }

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Admin</title>
  <link rel="stylesheet" type="text/css" href="css/add_up.css"> 
</head>
<body>
      <div class="adminbk">
       <span class="back"><a href="admindash.php"> < BACK TO ADMIN DASHBOARD</a></span>
      </div>

      <form method="POST" action="aduser.php" class="userform_add" autocomplete="off">
        <fieldset class="adduser_form">
          <legend class="leg">Add Admin</legend>
        
          <p>
            <label>Admin_ID</label>
            <input type="text" name="Admin_ID"  placeholder="AI#" required >
          </p>

          <p>
            <label>Name</label>
            <input type="text" name="Name" required>
          </p>

          <p>
            <label>Username</label>
            <input type="text" name="Username" value="" placeholder="AD#M#" required>
          </p>

          <p>
            <label>Admin_Email</label>
            <input type="email" name="Admin_Email" placeholder="ad#m#@autospotz.com" required>
          </p>
 

          <p>
            <label>Role</label>
            <input type="text" name="Role" required>
          </p>

          <p>
            <label>Phone_Number</label>
            <input type="text" name="Phone_Number" required>
          </p>

          <p>
            <label>Password</label>
            <input type="password" name="Password" required>
          </p>
          <button type="submit" class="submit_adduser" name="submit">Add</button>
          <button type="reset" class="reset_adduser" name="submit">Reset Form</button>
        </fieldset>
      </form>
</body>
</html>