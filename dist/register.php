<?php
if(isset($_POST['register'])){
    $username =$_POST['username'];
    $password =$_POST['password'];
    $secretKey='6LdrH5sUAAAAANqyObvkC0oOToah_VaGmq99gM4U';
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP=$_SERVER['REMOTE_ADDR'];

    $url  ="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
    $response =file_get_contents($url);
    echo $response;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
     integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
     crossorigin="anonymous">
      <!--Import Google Icon Font-->
     
      <!--Import materialize.css-->
     
   
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/register.css">
    
</head>
<body id="bg-img">
    <div class="overlay"></div>
          <header>
              <div class="menu-btn">
                  <div class="btn-line"></div>
                  <div class="btn-line"></div>
                  <div class="btn-line"></div>
              </div>

              <nav class="menu">
                  <div class="menu-branding">
                      <div class="potrait"></div><br><br>
                      <div class="icons">
                            <a href="#!">
                                <i class="fab fa-twitter fa-2x"></i>
                            </a>
                            <a href="#!">
                                  <i class="fab fa-facebook fa-2x"></i>
                              </a>
                              <a href="#!">
                                      <i class="fab fa-linkedin fa-2x"></i>
                                  </a>
                        </div>
                        <div class="container">
                              &copy;All Right Reserved,Healthcare
                        </div>
          

                  </div>
                  <ul class="menu-nav">
                      <li class="nav-item">
                          <a href="index.html" class="nav-link"><i class="fas fa-home"></i>Home</a>
                      </li>
                      <li class="nav-item current">
                        
                            <a href="register.html" class="nav-link"><i class="fas fa-user-edit"></i>Register</a>
                        </li>
                        <li class="nav-item">
                            <!--modal trigger-->
                                <a href="login.html" class="nav-link"><i class="fas fa-user-circle"></i>Login</a>
                            </li>
                            <li class="nav-item">
                                    <a href="/findDoner.html" class="nav-link"><i class="fas fa-hand-holding-heart"></i>Find Donor</a>
                                </li>
                                <li class="nav-item">
                                        <a href="/refer.html" class="nav-link"><i class="fas fa-user-friends"></i>Refer Friends</a>
                                    </li>

                  </ul>
              </nav>
          </header>


          <main id="register">
              <h1 class="lg-heading">
                <span class="text-secondary">Register</span> As a Donor
              </h1>
              <h2 class="sm-heading">
                  Save Life
              </h2>
              
            <br>
            <br>
              <br>

              <form action="#" method="post" enctype="">
                    <div class="register-box">
                 
                            <div class="textbox">
                                  <i class="fas fa-user-circle"></i>
                                <input type="text" placeholder="Username" name="username" value="" required>
                            </div>
          
                            <div class="textbox">
                                  <i class="fas fa-lock"></i>
                                  <input type="password" placeholder="Password" name="password" value="" required>
                              </div>
                              <div class="g-recaptcha" data-sitekey="6LdrH5sUAAAAAJboDumDH83g7JSaotYwd-FDiciA"></div>
          
                              <input type="button" class="btn" name="register" value="register">
                        </div>

                       
          
          
          
              </form>
          </main>

          <footer id="main-footer">

         

          </footer>


          <script src="js/main.js"></script>

          <script type="text/javascript" src="js/materialize.min.js"></script>
          <script src="js/jquery.js"></script>
    
</body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>