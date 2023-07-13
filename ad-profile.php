<!-- Kukka pg2-1 -->

<?php session_start(); ?>
<?php require 'config.php'; ?>
<?php 
  
  $sql = "SELECT * FROM admin WHERE Admin_ID = '" . $_SESSION["admin_id"] . "' LIMIT 1";

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
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="css/ad-styles.css">

<style type="text/css">
      
h2 {
 margin-left: 50px;
}

p {
  color: #818181 ;
  font-family: monospace;
}

legend {
  color: #818181;
  min-width: 100px;
}

form {
  width: 100;
  gap: 9.8rem;
  display: flex ;
  margin-left: 40px;
}

fieldset {
  font-size: 20px;
  font-weight: 600;
  padding: 20px;
  margin-top: 30px;
  width: 30%;   
  background-color: #272C4A; 
}

.info {
  margin-top: 20px;
  width: 78%;
  margin-left: 
}

.inputbox button {
   border-radius: 5px;
   background-color: darkgray;
   color: black;
   border: 1px;
   height: 30px;
   width: 60px;
}

input {
  border-radius: 5px;
  color: white;
  height: 20px;
  border: 1px;
  width: 200px;
}

img {
  width: 100px;
  height: 100px;
  margin-left: 35%;

}


</style>
  
  </head>

  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span class="material-icons-outlined">search</span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span>AUTOSPOTZ</span>
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="admindash.php" target="_self">
              <i class="fa-solid fa-bars"></i> Dashboard
            </a>
          </li>

          <li class="sidebar-list-item">
            <a href="ad-profile.php" target="_self">
              <i class="fa-solid fa-user"></i> Admin Profile
            </a>
          </li>

          <li class="sidebar-list-item">
            <a href="um-display.php" target="_self">
              <i class="fa-solid fa-people-roof"></i>User Management
            </a>
          </li>

          <li class="sidebar-list-item">
            <a href="sm-display.php" target="_self">
             <i class="fa-solid fa-car"></i> Slot Management
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="cm-display.php" target="_self">
              <i class="fa-solid fa-bars"></i> Contact Management
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="logout.php" >
             <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
          </li>
         
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>ADMIN PROFILE</h2>
        </div>  




      <div class="ud-content">
        <form class="form" action="/action_page.php">
             <fieldset class="img">
                <br>
                <legend>Profile Picture</legend>
                <img src="images/DP.png">
                <input type="file" name="butt" onchange="readURL(this)" accept="Image/*">
             </fieldset>

             <fieldset class="pass">
                <br>
                <legend>New password</legend>
                  <div class="inputbox">
                  
                    <input type="password" placeholder = "New Password"><br><br>
                    <button type="submit">Confirm</button>
                    <button type="reset">Reset</button><br><br>
                  </div>
             </fieldset>
        </form><br><br>

        <form>
         <fieldset class="info">
                <br>
                <legend>Personal Information</legend>
                   <div class="inputbox">
                    <p>
          <label>Admin_ID :</label>
          <input type="text" name="Admin_ID" <?php echo 'value="' . $Admin_ID . '"'; ?> disabled >
        </p>

        <p>
          <label>Name :</label>
          <input type="text" name="Name" <?php echo 'value="' . $Name . '"'; ?> disabled>
        </p>

         <p>
          <label>Username :</label>
          <input type="text" name="Username" <?php echo 'value="' . $Username . '"'; ?> disabled>
        </p>

           <p>
          <label>Admin_Email :</label>
          <input type="text" name="Admin_Email" <?php echo 'value="' . $Admin_Email . '"'; ?> disabled>
        </p>
 

        <p>
          <label>Role :</label>
          <input type="text" name="Role" <?php echo 'value="' . $Role . '"'; ?> disabled>
        </p>

         <p>
          <label>Phone_Number :</label>
          <input type="text" name="Phone_Number" <?php echo 'value="' . $Phone_Number . '"'; ?> disabled>
        </p>

         <p>
          <label>Password :</label>
          <input type="password" name="Password" <?php echo 'value="' . $Password . '"'; ?> disabled>
        </p>
              
                   </div>
          </fieldset><br><br>
        </form>
    </div>



      </main>
    
  </body>
</html>