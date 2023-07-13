<!-- Kaniska pg1 -->

<!DOCTYPE html>
<html>
    <head>
        <title>AutoSpotZ</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet"  type="text/css" href="css/in-style.css">
        <script>
          // Get the content element and the toggle button
          const content = document.getElementById('content');
          const toggleButton = document.getElementById('ca-btn');
          
          // Add an event listener to the toggle button
          toggleButton.addEventListener('click', function() {
            // Toggle the "hidden" class of the content element
            content.classList.toggle('hidden');
          });
        </script>
    </head>
    <body>
    <!-- Header section-->
    <nav class="navbar">
      <div class="logo">
        <a href="index.php"><img src = "images/logo1.png"></a>
      </div>
    
      <ul class="nav-links">
        <li><a href="services.html">Our Services</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
 
     <div class="login-signup">
     <a href="Register.php"> <button class="register-btn" >Register</button></a>   
     <a href="login.php"> <button class="login-btn" >Login</button></a>   
     </div>
     
    </nav>
    
     <!-- content-->
    <div class = "hero-content">

      <div class = "availabitiy-box">
    
        <form  method="POST" action="">
        <div class= "avail-divs"> 
          <h3 class = "check">Check Parking availabiltiy </h3>
          <br>
          <label for="vehicle_type">Choose a vehical type:</label>
          <select id = "vehicle_type" name = "vehicle_type">
            <option value="car">car</option>
            <option value="van">van</option>            
          </select>
        </div>
        <div class= "avail-divs"> 
          <label for="checkin">Enter checkin:</label>
          <input type="datetime-local" id="checkin" name="checkin"  required >
        </div>
        <div class= "avail-divs"> 
          <label for="checkin">Enter checkout:</label>
          <input type="datetime-local" id="checkout" name="checkout"  required>
        </div>
        <div class = "avail-btns">
          <button type="submit" id="ca-btn">Check Availability</button>
        </div>          
       </form>
      
       <?php
// code to check availbility of slot in a certain time period 

include_once 'config.php';

if (isset($_POST['vehicle_type'])&& isset($_POST['checkin']) && isset($_POST['checkout'])) {
    $vehicleType = $_POST['vehicle_type'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

     // Convert check-in and check-out to timestamps
     $checkinTimestamp = strtotime($checkin);
     $checkoutTimestamp = strtotime($checkout);

    // Perform availability check based on $checkin,$vehicleType and $checkout values
     $query = "SELECT COUNT(*) as num_booked 
              FROM bookings b , parkingslots p 
              WHERE b.Slot_ID = p.slotID
              AND p.Type = '$vehicleType'
              AND p.Status = 'Active'
              AND ((b.Check_IN <= '$checkin' AND b.Check_OUT >= '$checkin')
              OR (b.Check_IN <= '$checkout' AND b.Check_OUT >= '$checkout')
              OR (b.Check_IN >= '$checkin' AND b.Check_OUT <= '$checkout')
              OR (b.Check_IN <= '$checkin' AND b.Check_OUT >= '$checkout')) ";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $numBooked = $row['num_booked'];
        //change the values according to parking slot types
        if ($vehicleType === 'car' && $numBooked >= 2) {
            echo "Car parking slots are fully booked";

        } elseif ($vehicleType === 'van' && $numBooked >= 2) {
            echo "Van parking slots are fully booked";
        } else {
            echo "Parking slots are available for $vehicleType";
        }
    } else {
        echo "Parking slots are available for $vehicleType";
    }
    
} 
?>
      </div>
      <br>
      <div class = "hero-image">
        <img src ="images/parking-home.svg" alt = "parking image goes here">
      </div>

      </div>
    </div>



  <h2>TESTIMONIAL</h2>

    <div class="boxR">

<div class="box4">
  <img class="man1" src="https://www.profilebakery.com/wp-content/uploads/2023/04/linkedin-ai.jpg" width="100px" height="100px">
    <p class="p4">I was amazed by the automated parking system.
       It made parking hassle-free and saved me valuable time.
        I highly recommends it to everyone!</p>
        <h1>~ John Luther</h1>
  </div>

  <div class="box5">
  <img class="man2" src="https://images.squarespace-cdn.com/content/v1/572e050c4d088ea3a8f0ac9d/1652567753661-R2Q0NDAPAXPO9I7OQ6EK/850_6727-PRINT.jpg?format=1000w" width="100px" height="100px">
    
    <p class="p5">I was impressed with the automated parking system.
       It provided a secure and efficient parking experience,
        giving me peace of mind. I couldn't be happier!"</p>
         <h1>~ Maya Francesca</h1>
  </div>

  <div class="box6">
  <img class="man3" src="https://i.pinimg.com/originals/7d/ea/2d/7dea2dbab4e77fc02764f092599fd10c.jpg" width="100px" height="100px">
    
    <p class="p6">I found the automated parking system to be an
       interesting concept. It offered a unique solution to parking
        challenges, making it worth considering for future projects.</p>
       <h1>~ David White</h1>
  </div>
</div>



<div id="lines">
<div class="line"></div>
<div class="line"></div>
<div class="line"></div>
</div>

<br>
<br>

<!-- sithumini's faq-->

<div class="wrapper">
    <h2>FAQ's</h2>

    <div class="faq ">
        <button class="accordion">
            What is an automated parking system?
        <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
            <p>Automated car parking system is a mechanism that uses a system of pallets, lifts to automate parking and retrieving of cars. Such systems extend vertically, increasing the floor area and volume, to overcome space constraints. They allow you to maximise the parking, and thus accommodate more number of cars in a small space or reduce the space needed to park the same number of cars or allow car parking where previously there would have been no room. Automated car parks can be situated above or below ground or a combination of both, and designed to accommodate any number of cars.</p>
        </div>
    </div>
    <div class="faq ">
        <button class="accordion">
           Can the solution be implemented under stilts or on a podium of a building?
        <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
            <p>Automated car parking systems can be installed in any location like under stilts, on podiums, in basements, on rooftops, over open grounds, on terraces, or in driveways.</p>
        </div>
    </div>
    <div class="faq ">
        <button class="accordion">
            Do we need to build a special structure/ foundation to install this system?
        <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
            <p>This system is an independent free standing structure which can be installed indoor as well as outdoor. We can provide details of foundation preferred for installing the system. Foundation needs to be installed by the client in consultation with the structural engineer. For longer life, it is advisable to cover the system with a canopy.</p>
        </div>
    </div>
    <div class="faq ">
        <button class="accordion">
            What is the minimum area required per module?
        <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
            <p>There are more than 14 Systems available and depending on space available, the system is designed. Most of the systems are multiples of 6.2 meters. X 2.5 meters. Minimum drive way of 6 meters is required for smooth parking.</p>
        </div>
    </div>
    <div class="faq ">
        <button class="accordion">
           What is the maximum number of cars that can be accomodated in an automated parking system?
        <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
            <p>While there is no upper limit of the maximum numbers of cars that can be accommodated in an automated parking system, the numbers depend on the available area and the parking system adapted. Currently, some of the world’s largest automated parking facilities hold around 2000 cars, including our on-going project for Bharti Realty Limited (Airtel) that is designed to accommodate more than 2000 cars.</p>
        </div>
    </div>
    <div class="faq ">
        <button class="accordion">
            Can these system be installed in open air or do they need any protection from rains ?
        <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
            <p>Automated car parking systems can be built above ground, underground, inside a building, on top of a building or under a building. Our systems are well prepared, coated with layers that offer protection and adapted to almost any operating environment to withstand all aspects of environmental conditions but regular greasing, painting, maintenance and upkeep is of utmost importance for optimum protection. Efficient structural integration is crucial to the maximum functioning of the system. For example, continuous exposure to severe salt spray / seawater or poorly designed drainage and floor slope can create long term maintenance problems. Our team of experts can consult the client’s structural engineer during planning and construction.</p>
        </div>
    </div>
    
   
  
    </div>
   </div>
   
   <script>
    var acc =document.getElementsByClassName("accordion");
    var i;

    for(i=0; i<acc.length; i++){
        acc[i].addEventListener("click",function(){
            this.classList.toggle("active");
            this.parentElement.classList.toggle("active");

            var pannel = this.nextElementSibling;
            
            if(pannel.style.display === "block"){
                pannel.style.display = "none";
            }
            else{
                pannel.style.display = "block";
            }
        });

    }
   </script>

    <!-- Footer section-->
    <footer>
        <p>&copy; ALL RIGHTS RESERVED | <a href="tnc.html">TERMS & CONDITIONS<a> </p>
    </footer>

    </body>
</html>


