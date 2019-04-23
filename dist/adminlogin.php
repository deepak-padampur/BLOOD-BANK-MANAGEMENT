<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Admin Login</title>
    <link rel="icon" href="img/brand1.jpg" type="image/gif" sizes="16x16">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
     integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
     crossorigin="anonymous">
      <!--Import Google Icon Font-->
     
      <!--Import materialize.css-->
     
   
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    
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
                          <a href="index.php" class="nav-link"><i class="fas fa-home"></i>Home</a>
                      </li>
                      <li class="nav-item">
                        
                            <a href="register.php" class="nav-link"><i class="fas fa-user-edit"></i>Register</a>
                        </li>
                        <li class="nav-item">
                            <!--modal trigger-->
                                <a href="login.php" class="nav-link"><i class="fas fa-user-circle"></i>Login</a>
                            </li>
                            <li class="nav-item current">
                                    <a href="/adminlogin.php" class="nav-link"><i class="fas fa-hand-holding-heart"></i>Admin Login</a>
                                </li>
                                <li class="nav-item">
                                        <a href="/refer.html" class="nav-link"><i class="fas fa-user-friends"></i>Refer Friends</a>
                                    </li>

                  </ul>
              </nav>
          </header>


          <main id="register">
              <h1 class="lg-heading">
                <span class="text-secondary">Login</span>
              </h1>
              <h2 class="sm-heading">
                As Admin
              </h2>

              <form action="includes/adminlogin.inc.php" method="POST">
                    <div class="login-box">
                    <img src="img/user.jpg" alt="" class="user">
                            <div class="text-box">
                                  <i class="fas fa-user-circle"></i>
                                <input type="text" placeholder="Username" name="uname" value="" required>
                            </div>
          
                            <div class="text-box">
                                  <i class="fas fa-lock"></i>
                                  <input type="password" placeholder="Password" name="pwd" value="" required>
                              </div><br>
                              <a href="#">Forgot Password &rarr;</a><br><br>
                           
                              <input type="submit" class="button btn"onclick="myFunction()" name="adminlogin" value="login &rarr;">
                        </div>
                       
          
          
          
              </form>
          </main>

          <footer id="main-footer">

         

          </footer>


          <script src="js/main.js"></script>

          <script type="text/javascript" src="js/materialize.min.js"></script>
          <script src="js/jquery.js"></script>
         
    
</body>
</html>