<?php
session_start();
include 'includes/connection.php';

?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--jquery ui--->
      <link rel="stylesheet" href="js/jquery-ui.theme.css">
      <script src="js/jquery-ui.js"></script>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link rel="icon" href="img/brand1.jpg" type="image/gif" sizes="16x16">


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8  ">
      <script  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" ></script>
      
      <title>USER DASHBORD</title>
      <style>
      nav,main{
        padding-left:300px;
      }
      @media only screen and (max-width:992px){
        nav,main{
          padding-left:0;
        }
      }
      blockquote{
        border-left: white;
      }
      button{
        border:none;
      
        background:none;
      }
      </style>

    </head>

    <body>
    
    <div class="navbar-fixed">
         
    <nav class="grey lighten-5">
            <div class="nav-wrapper">
          
           
                <a href="" class="brand-logo  black-text">CHAT | APPLICATION</a>
                <a href="#" data-target="slide-out" class=" sidenav-trigger"><i class="material-icons grey-text">menu</i></a>
            
              <a href="" class="brand-logo dropdown-trigger right" data-target="dropdown1">
              <?php
              if(isset($_SESSION['u_name'])){
              
                
               echo "<img  src=\"./uploads/". $_SESSION['u_img']."\" alt=\"photo\" width=\"30\" height=\"30\" class=\"img-responsive circle\" />"; 
              }else{
                echo "<img  src='img/user.jpg' alt=\"photo\" width=\"30\" height=\"30\" />"; 
              }
              
              
              ?>
          
                 
                </a>
            </div>
        </nav>
    </div>
      
      
        
      
     