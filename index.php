<?php 
include './php/session_user_index.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet'  href='./css/style.css'>
    
</head>
<body>
    <div class="background-image">
        <nav class="navbar">
            <div class="logo"><i class="fa-solid fa-house-signal" style="color: #80ffff;"> </i></div>
                
            

                <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
                </a>
                <div class="navbar-links">
                    <ul class="toggle-ul">
                        <div class="nav-middle">
                            <li><a href="index.php" class="text-white">Home</a></li>
                        </div>
                        <div class="nav-logout">
                            <li><a href="./login-signup/login_form.php">Login</a></li>
                        </div>
                        
                    </ul>
                </div>
        </nav>
        <div class="containerew">
        <div class="centered-text">
            <h1 id="hidden-text">Experience the Future of Living: Transform Your Home with Smart Automation!</h1>
        </div>
    </div>
    </div>
    <section class="services">
        <h1 id="heading">Our Services</h1>
        <div class="box-container">
            <div class="box">
                <img src="./images/icon1.png" alt="">
                <h2>Controlling Air Conditioner</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
            </div>
            <div class="box">
                <img src="./images/icon2.png" alt="">
                <h2>Controlling Robot Vacuum Cleaner</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
            </div>
            <div class="box">
                <img src="./images/icon3.png" alt="">
                <h2>Controlling Washing Machine</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
            </div>
            <div class="box">
                <img src="./images/icon4.png" alt="">
                <h2>Controlling Lights</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
                
            </div>
            <div class="box">
                <img src="./images/icon5.png" alt="">
                <h2>Controlling Coffe Machine</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
            </div>
            <div class="box">
                <img src="./images/icon6.png" alt="">
                <h2>7/24 Support</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit.</p>
            </div>
        </div>

    </section>
 
    <footer class="footer">
        <div class="box">
            
            <span id="footer-element">
                <i class="fa-solid fa-envelope" style="color: #b6decd;"></i>
                555-555-55-55
            </span>
            <span id="footer-element">
                <i class="fa-solid fa-phone" style="color: #b6decd;"></i>    
                123-456-78-90
            </span>
            <span id="footer-element">
                <i class="fa-solid fa-envelope" style="color: #b6decd;"></i>
                abc@gmail.com
            </span>
            <span id="footer-element">
                <i class="fa-sharp fa-solid fa-location-dot" style="color: #b6decd;"></i>
                Antalya, Turkey
            </span>
        </div>

        <div class="box">
            <span id="footer-element">
                <i class="fa-brands fa-facebook" style="color: #b6decd;"></i>
                Facebook
            </span>
            <span id="footer-element">
         
                <i class="fa-brands fa-instagram" style="color: #b6decd;"></i>
                Instagram
            </span>
            <span id="footer-element">
          
                <i class="fa-brands fa-twitter" style="color: #b6decd;"></i>
                Twitter
            </span>
            <span id="footer-element">
    
                <i class="fa-brands fa-linkedin" style="color: #b6decd;"></i>
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