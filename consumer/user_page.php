<?php 
include '../php/session_user.php'

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet'  href='../css/style.css'>
    
</head>
<body>
    <div class="background-image">
        <nav class="navbar">
        <div class="logo">LOGO</div>
            <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
            </a>
            <div class="navbar-links">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="../consumer/consumer.html">Rooms</a></li>
                <li><a href="../login-signup/login_form.php">Login</a></li>
                <li><a href="#"><span> <?php echo $_SESSION['user_name'] ?> </span></a></li>
            </ul>
            </div>
        </nav>
      </div>
      <section class="services">
        <h1 id="heading">Our Services</h1>
        <div class="box-container">
            <div class="box">
                <img src="../images/icon1.png" alt="">
                <h2>Controlling Air Conditioner</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
            </div>
            <div class="box">
                <img src="../images/icon2.png" alt="">
                <h2>Controlling Robot Vacuum Cleaner</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
            </div>
            <div class="box">
                <img src="../images/icon3.png" alt="">
                <h2>Controlling Washing Machine</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
            </div>
            <div class="box">
                <img src="../images/icon4.png" alt="">
                <h2>Controlling Lights</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
                
            </div>
            <div class="box">
                <img src="../images/icon5.png" alt="">
                <h2>Controlling Coffe Machine</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
            </div>
            <div class="box">
                <img src="../images/icon6.png" alt="">
                <h2>7/24 Support</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
            </div>
        </div>

      </section>
 
      <footer class="footer">
        <div class="box">
            
            <span>
                <i class="fa-solid fa-envelope" style="color: #dc143c;"></i>
                555-555-55-55
            </span>
            <span>
                <i class="fa-solid fa-phone" style="color: #dc143c;"></i>    
                123-456-78-90
            </span>
            <span>
                <i class="fa-solid fa-envelope" style="color: #dc143c;"></i>
                abc@gmail.com
            </span>
            <span>
                <i class="fa-sharp fa-solid fa-location-dot" style="color: #dc143c;"></i>
                Antalya, Turkey
            </span>
        </div>

        <div class="box">
            <span>
                <i class="fa-brands fa-facebook" style="color: #dc143c;"></i>
                Facebook
            </span>
            <span>
                <i class="fa-brands fa-instagram" style="color: #dc143c;"></i>
                Instagram
            </span>
            <span>
                <i class="fa-brands fa-twitter" style="color: #dc143c;"></i>
                Twitter
            </span>
            <span>
                <i class="fa-brands fa-linkedin" style="color: #dc143c;"></i>
                LinkedIn
            </span>
        </div>
        
      </footer>

      <script>
        const toggleButton = document.getElementsByClassName('toggle-button')[0]
        const navbarLinks = document.getElementsByClassName('navbar-links')[0]

        toggleButton.addEventListener('click', () => {
            navbarLinks.classList.toggle('active')
        })  
      </script>
    
</body>
</html>