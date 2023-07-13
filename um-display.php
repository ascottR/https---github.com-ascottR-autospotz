<!-- Kaniska pg4-1 -->


<?php
include 'config.php';      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slot Management</title>
    <link rel="stylesheet" href="css/um-style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <script type="text/javascript" src="scripts.js"></script>
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
    <h2>User MANAGEMENT DASHBOARD</h2>
  </div>
   
<div class="container">
<div id="box">
    <center><h2>User Managerment List View</h2></center>
    <button class="add-btn" ><a href="um-adduser.php" >Add user</a>
</button>

<table class="table">
  <tbody>
    <thead>
      <tr id="head">
        <th scope="col">SL no</th>
        <th scope="col">Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">License_No</th>
        <th scope="col">Mobile</th>
        <th scope="col">Operation</th>
      </tr>
    </thead>

<!--php codes-->
<?php
$sql ="SELECT * FROM `users`";
$result=mysqli_query($conn,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id = $row['User_ID'];
            $First_Name = $row['First_Name'];
            $Last_Name = $row['Last_Name'];
            $Username = $row['Username'];
            $Email = $row['Email'];
            $License_No = $row['License_No'];
            $Phone_No = $row['Phone_No'];
            echo ' <tr>
            <th scope="row">'.$id.'</th>
            <td>'.$First_Name.'</td>
            <td>'.$Last_Name.'</td>
            <td>'.$Username.'</td>
            <td>'.$Email.'</td>
            <td>'.$License_No.'</td>
            <td>'.$Phone_No.'</td>
            <td>
              <a type="button" class="up-btn" href="um-update.php?updateid='.$id.'">Update</a>
              <a type="button" class="dlt-btn" href="um-delete.php?deleteid='.$id.'">Delete</a>   
              </td>
            </tr>';
        }
  }
?>


  </tbody>
</table>
</div>

</body>
</html>