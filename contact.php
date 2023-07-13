<!-- Kukka pg3-1 -->


<?php
    require 'config.php';
?>

<?php
    
    if(isset($_POST['submit'])) {
               
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Message = $_POST['message'];

        $sql = "INSERT INTO contact VALUES ('','$Name','$Email','$Message');";

        $result = mysqli_query($conn, $sql);

        if(!$result) {
          die(mysqli_query_error($conn));
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Page</title>
    <link rel="stylesheet" href="css/contact-style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <div class="contact">
      <div class="form">

        <div class="contact-info">
          
          <h3 class="title">Let's Contact</h3>
          <p class="text">
            Parking your car at our <b>AUTOSPOTZ</b> means, you are safer than parking your car at home !... 
          </p>

          <div class="info">
            <div class="information">
              <img src="images/location.png" class="icon" alt="" />
              <p> 14 Colombo 7 </p>
            </div>

            <div class="information">
              <img src="images/email.png" class="icon" alt="" />
              <p>info@autospotz.lk</p>
            </div>

            <div class="information">
              <img src="images/phone.png" class="icon" alt="" />
              <p>077-5490587</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>

        </div>

        <div class="contact_form">
          <form method="POST" action="contact.php" autocomplete="off">
            <h3 class="title"><b>Contact us</b></h3>

            <div class="input-container">
              <input type="text" required="yes" name="name" class="input" />
              <label for="">Name</label>
              <span>Name</span>
            </div>

            <div class="input-container">
              <input type="email" required="yes" name="email" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>

            <div class="input-container textarea">
              <textarea name="message" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>

            <input name="submit" type="submit" value="Send" class="btn" />
          </form>
        </div>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>
</html>
