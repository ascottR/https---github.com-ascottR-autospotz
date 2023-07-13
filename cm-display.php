<!-- Sali pg3-1 -->

<?php
include 'config.php';      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts Management</title>
    <link rel="stylesheet" href="css/cm-style.css">

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
          <h2>Contact MANAGEMENT DASHBOARD</h2>
        </div>

    <div class="container">
        <center><h2>Contact Managerment List View</h2></center>    
    <table class="table">
        <tbody>
        <thead>
            <tr>
                <th scope="col">Conatact ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Message </th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        
        <?php
    $sql="SELECT * FROM  contact";     
    $result=mysqli_query($conn,$sql);
    if($result){
        while( $row=mysqli_fetch_assoc($result)){
            $contactId=$row['Msg_ID'];
            $name=$row['Name'];
            $email=$row['Email'];
            $message=$row['Message'];
    
            echo '<tr>
            <th scope="row">'.$contactId.'</th>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td>'.$message.'</td>
            <td>
            <a type="button" class="up-btn" href="cm-edit.php?editid='.$contactId.'">Edit</a>
            <a type="button" class="dlt-btn" href="cm-delete.php?deleteid='.$contactId.'">Delete</a>   
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