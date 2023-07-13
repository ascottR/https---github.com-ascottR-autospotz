<!-- Kukka pg1-1 -->
<?php session_start(); ?>
<?php require 'config.php'; ?>
<?php 
  
  $user_list = '';

  // getting the list of users
  $query = "SELECT * FROM admin WHERE is_deleted=0 ORDER BY Admin_ID";
  $users = mysqli_query($conn, $query);

  if ($users) {
    while ($user = mysqli_fetch_assoc($users)) {
      $user_list .= "<tr>";
      $user_list .= "<td>{$user['Admin_ID']}</td>";
      $user_list .= "<td>{$user['Name']}</td>";
      $user_list .= "<td>{$user['Username']}</td>";
      $user_list .= "<td>{$user['Admin_Email']}</td>";
      $user_list .= "<td>{$user['Role']}</td>";
      $user_list .= "<td>{$user['Phone_Number']}</td>";
      $user_list .= "<td>{$user['Password']}</td>";

      $user_list .= "<td><a href=\"editeuser.php?admin_id={$user['Admin_ID']}\"><button>Update</button></a></td>";
      $user_list .= "<td><a href=\"adminDelete.php?admin_id={$user['Admin_ID']}\"><button>Delete</button></a></td>";
      $user_list .= "</tr>";
    }
  } else {
    echo "Database query failed.";
  }
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
.admin_list {
    border-collapse: collapse;
    margin: 25px 0;
    margin-left: 10%;
    font-size: 0.9rem;
    size: 20%;
    width: 30%;
}

.admin_list th, .admin_list td {
  padding: 1px 15px;

}

.admin_list th {
  background-color: green;
}

.admin_list tr {
  border-bottom: 1px solid #dddddd;
}

.admin_list tr:nth-of-type(odd) {
  background-color: #263043;
}

.admin_list td {
  font-size: 12px;
}

.admin_list button {
  size: 10px;
  background-color: blueviolet;
  color: white;
  border-radius: 20px;
  border: 1px;
  height: 25px;
}

.admin_list .box {
  margin-top: 40px;
}

#head {
  background-color: #263043;
  font-family: monospace;
  font-size: 17px;
  text-align: left;
}

main h4 {
  margin-left: 40%;
  margin-top: 80px ;
}

main .add {
  text-decoration: none;
  font-family: monospace ;
}

span .addnew {
  background-color: blueviolet;
  margin-left: 20px;
  border-radius: 5px;
  border: 1px;
  height: 25px;
  color: white;
}

.main-title {
  margin-left: 50px;
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
            <a href="#" target="_self">
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
            <a href="sm-display.php"  target="_self">
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
          <h2>ADMIN DASHBOARD</h2>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <h3>ACTIVE</h3>
              <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1>249</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>PARK UNITS </h3>
              <span class="material-icons-outlined">category</span>
            </div>
            <h1>5</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>CUSTOMERS</h3>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1>980</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>ALERTS</h3>
              <span class="material-icons-outlined">notification_important</span>
            </div>
            <h1>23</h1>
          </div>

        </div>

        <div class="charts">

          <div class="charts-card">
            <h2 class="chart-title">Top 5 Vehicle Type</h2>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title">Average Parking</h2>
            <div id="area-chart"></div>
          </div>

        </div>

<div class="box">
    <main class="">
        <h4 class="">SYSTEM ADMIN LIST<span ><a href="aduser.php"><button class="addnew">+ Add New</button></a></span></button></h4>
          <div class="whole">
             <table border="0px" class="admin_list">
                <tr id="head">
                     <th>Admin_ID</th>
                     <th>Name</th>
                     <th>Username</th>
                     <th>Admin_Email</th>
                     <th>Role</th>
                     <th>Phone_Number</th>
                     <th>Password</th>
                     <th>Update Data</th>
                     <th>Delete Data</th>
                </tr>

                <?php echo $user_list; ?>
             </table>
          </div>
    </main>
  </div>
    
    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>