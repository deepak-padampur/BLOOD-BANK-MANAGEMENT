<?php
session_start();
include_once 'includes/connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="icon" href="img/brand1.jpg" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
     integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
     crossorigin="anonymous">
      <!--Import Google Icon Font-->
     
      <!--Import materialize.css-->
      <!--<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>-->
     
   
   <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/register.css">
    <style>
    
    
    </style>

    
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
                      <li class="nav-item current">
                        
                            <a href="register.php" class="nav-link"><i class="fas fa-user-edit"></i>Register</a>
                        </li>
                        <li class="nav-item">
                            <!--modal trigger-->
                                <a href="login.php" class="nav-link"><i class="fas fa-user-circle"></i>Login</a>
                            </li>
                            <li class="nav-item">
                                    <a href="adminlogin.php" class="nav-link"><i class="fas fa-hand-holding-heart"></i>Admin Login</a>
                                </li>
                                <li class="nav-item">
                                        <a href="/refer.html" class="nav-link"><i class="fas fa-user-friends"></i>Refer Friends</a>
                                    </li>

                  </ul>
              </nav>
          </header>


          <main id="register">
              <h1 class="lg-heading">
                <span class="text-secondary">Register</span>
              </h1>
              <h2 class="sm-heading">
                  For Free,Become a Blood Donor
              </h2>
              
            <br>
            <br>
              <br>

             <div class="container">
                 <div class="row">
                     <div class="l6 m6 s12">
                     <form action="includes/register.inc.php" method="POST" enctype="multipart/form-data">
                    <div class="register-box">

                    <div class="textbox">
                    <i class="fas fa-user"></i>
                                <input type="text" placeholder="Name" name="name" value="" required>
                            </div>
          
                 
                            <div class="textbox">
                                  <i class="fas fa-user-circle"></i>
                                <input type="file" placeholder="profile img" name="file" value="" required>
                            </div>
                            <div class="textbox">
                                  <i class="fas fa-user-circle"></i>
                                <input type="text" placeholder="Username" name="username" value="" required>
                            </div>
          
          
                            <div class="textbox">
                                  <i class="fas fa-lock"></i>
                                  <input type="password" placeholder="Password" name="password" value="" required>
                              </div>
                             
                              <!--upload Profile pic here-->
                              <div class="textbox">
                              <i class="fas fa-envelope"></i>
                                  <input type="text" placeholder="Email-id" name="email" value="" required>
                              </div>
                              <div class="textbox">
                              <i class="fas fa-phone"></i>
                              <input type="number" placeholder="Contact" name="contact" value="" required>
                              </div>
                              <div class="textbox">
                              <i class="fas fa-map"></i>
                                  <select type="text" placeholder="state" id="ss" name="state" value="" onChange="change_state()" required>
                                  <?php
                                  $recv=mysqli_query($conn,"SELECT DISTINCT city_state FROM cities");
                                  while($row=mysqli_fetch_array($recv))
             {
                ?><option value=" <?php  echo $row['city_state'];?>">

                <?php echo $row['city_state'];
                    
                ?>
                </option><?php
             }?>
             </SELECT>
             </div>
            

      
                            
                              <div class="textbox">
                              <i class="fas fa-landmark"></i>
                                  <select type="text" placeholder="city" name="city" value="" id="cc" required>
                                  <?php
                                  
                                  $recv=mysqli_query($conn,"SELECT DISTINCT city_name FROM cities");
                                  while($row=mysqli_fetch_array($recv))
             {
                ?><option value=" <?php echo $row['city_name'];?>">

                <?php echo $row['city_name'];?>
                </option><?php
             }?>
             </SELECT></div>
         
                              <div class="textbox">
                              <i class="far fa-calendar-alt"></i>
                                <input type="date" placeholder="Date of Birth" name="dob" value="" required>
                            </div>
                            <!--Gender-->
                                 <p>Gender</p>
                                <input type="radio" id="male" name="gender" value="Male"/>
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" value="Female"/>
                                <label for="female">Female</label>
                                <input type="radio" id="others" name="gender" value="Others"/>
                                <label for="others">Others</label>
                                <div class="textbox">
                                    <!--Select-->
                                    <select name="bloodgroup" id="">
                                        
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>

                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="Bombay Group">Bombay Group</option>
                                        <option value="A1+">A1+</option>
                                        <option value="A1-">A1-</option>
                                        <option value="A1B+">A1B+</option>
                                        <option value="A1B-">A1B-</option>
                                        <option value="A2+">A2+</option>
                                        <option value="A2-">A2-</option>
                                        <option value="A2B+">A2B+</option>

                                    </select>
                                </div>
                            
                              <div class="g-recaptcha" data-sitekey="6LdrH5sUAAAAAJboDumDH83g7JSaotYwd-FDiciA"></div>
          
                              <button type="submit" class="btn" name="register">register &rarr;</button>
                        </div>

                       
          
          
          
              </form>
                     </div>
                 </div>
             </div>
          </main>

          <footer id="main-footer">

         

          </footer>


          <script src="js/main.js"></script>

          <script type="text/javascript" src="js/materialize.min.js"></script>
          <script src="js/jquery.js"></script>
    
</body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>