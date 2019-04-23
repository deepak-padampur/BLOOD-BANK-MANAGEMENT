<?php
session_start();
include 'includes/connection.php';

?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link rel="icon" href="img/brand1.jpg" type="image/gif" sizes="16x16">


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                                      <script src="chart.js"></script>
      <title>ADMIN DASHBORD</title>
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
        color:#00e5ff;
        
        background:none;
      }
      </style>

    </head>
    <body>
    
    <div class="navbar-fixed">
         
    <nav class="grey lighten-5">
            <div class="nav-wrapper">
          
           
                <a href="" class="brand-logo center grey-text">ADMIN | DASHBOARD</a>
                <a href="#" data-target="slide-out" class=" sidenav-trigger"><i class="material-icons grey-text">menu</i></a>
            
              <a href="" class="brand-logo dropdown-trigger right" data-target="dropdown1">
              <img  src='img/user.jpg' alt='photo' width='30' height='30' />
         
          
                   
                </a>
            </div>
        </nav>
    </div>
      
      
        
      
     
           <!--side nav goes here-->
           <ul id="slide-out" class="sidenav sidenav-fixed collapsible">
    <li> 
     <div class="user-view">
  <div class="background">
  <img src="img/bg.jpg" alt="" class="responsive-img">  
  </div> 
    
      <a href="#name"><span class="black-text name"><span><?php if(isset($_SESSION['u_admin'])){
          echo $_SESSION['u_admin'];
          }else{
              echo "You are not logged in";
          }?></span></a>
      <a href="#email"><span class="black-text email"><span><?phpif(isset($_SESSION['u_admin'])){
          echo $_SESSION['u_email'];
          }else{
              echo "email not available";
          }?></span></a>
     
     </div>
    </li>
    
    
    <li><div class="collapsible-header black-text"><a href="#!">Stock Status<i class="material-icons left">schedule</i></a></div></li>
    <li><div class="divider"></div></li>
    <li><div class="collapsible-header black-text"><a href="#con">Donation<i class="material-icons left">timeline</i></a></div></li>
    <li><div class="divider"></div></li>
    <li><div class="collapsible-header black-text"><a href="">Add Blood<i class="material-icons left">add</i></a></div></li>
    <li><div class="divider"></div></li>
    <li><div class="collapsible-header black-text"><a href="#pro">Registered Users<i class="material-icons left">person</i></a></div></li>
    <li><div class="divider"></div></li>
   
    <li><div class="collapsible-header black-text"><a href="#">Notifications<i class="material-icons left">notifications_active</i><span class="new badge  black">1</span></a></div>
          <div class="collapsible-body"><a href="#">notifications from users goes here</a></div>
    </li>
    <li><div class="divider"></div></li>
    <li><div class="collapsible-header black-text"><?php if(isset($_SESSION['u_admin'])){
          echo  '<form action="includes/adminlogout.inc.php" method="post" enctype="multipart/form-data">';
          echo'<button name="adminlogout" type="submit">';echo'Logout';echo'<i class="material-icons left">';echo"exit_to_app";echo"</i></button>";
         echo '</form>';
    }else{
      echo  '<a href="adminlogin.php" >';echo'Login';echo'<i class="material-icons left">';echo"exit_to_app";echo"</i></a>";
    }?></div></li>
    <li><div class="divider"></div></li>
  </ul>
  
  <!--side nav ends-->
                        <main>
                            <div class="container">
                                <div class="row">
                                <div class="col l12 m12 s12">
                                       
                                       <div class="card-panel z-depth-5">
                                       <div class="card-title">
                                       <blockquote class="flow-text">
                                       BLOOD STOCK
                                       
                                       </blockquote>
                                       </div>
                                       <div id="chart"></div>
                                       
                                       </div>
                                           
                                      </div>
                                   
                                   

                                    <div class="col l12 m12 s12">
                                    
                                      
                                                <blockquote class="flow-text">
                                                REGISTERED USERS
                                            </blockquote>
                                              
                                                <?php
                                               if(isset($_SESSION['u_admin'])){
                                                $reg=mysqli_query($conn,"SELECT * FROM users");
                                                $file = mysqli_query($conn,"SELECT * FROM files");
                                                echo "<table class='responsive-table centered highlight z-depth-5 hoverable'>";
                                                echo"<tr>";
                                                echo "<th>";echo"PROFILE IMAGE";echo"</th>";
                                                echo "<th>";echo"NAME";echo"</th>";
                                                
                                              
                                                echo "<th>";echo"EMAIL";echo"</th>";
                                                echo "<th>";echo"CONTACT";echo"</th>";
                                                echo "<th>";echo"STATE";echo"</th>";
                                                echo "<th>";echo"CITY";echo"</th>"; 
                                                echo "<th>";echo"BLOOD GROUP";echo"</th>";
                                                echo "<th>";echo"HEALTH STATUS";echo"</th>";

                                                echo "<th>";echo"APPROVE";echo"</th>";
                                                echo "<th>";echo" NOT APPROVE";echo"</th>";
                                                echo"</tr>";
                                                while($row=mysqli_fetch_array($reg)){
                                                  echo "<tr>";
                                                  echo "<td>";echo "<img  src=\"./uploads/".$row['img']."\" alt=\"photo\" width=\"30\" height=\"30\" class=\"img-responsive\" style=\"margin-top:-30px\" />";echo"</td>";
                                                  echo "<td>";echo $row['user_name'];echo"</td>";
                                        
                                                
                                                  echo "<td>";echo $row['user_email'];echo"</td>";
                                                  echo "<td>";echo $row['user_contact'];echo"</td>";
                                                  echo "<td>";echo $row['user_state'];echo"</td>";
                                                  echo "<td>";echo $row['user_city'];echo"</td>"; 
                                                  echo "<td>";echo $row['user_bg'];echo"</td>"; 
                                                if($row=mysqli_fetch_array($file)){
                                                  echo "<td>";echo $row['status'];echo"</td>"; 
                                                 }else{
                                                    echo "<td>";echo 'not uploded yet';echo"</td>";
                                                 }

                                                  echo "<td>";?><a href="approve.php?id=<?php echo $row['user_id'];?>">Approve</a><?php echo"</td>"; //for link complete php and start php
                                                  echo "<td>";?><a href="notapprove.php?id=<?php echo $row['user_id'];?>">Not Approve</a><?php echo"</td>"; 
                                                  echo"</tr>";
                                                    }
                                                
                                                echo"</table>";

                                               }else{
                                                 echo 'please login to access this page';
                                               }
                                                ?>
                                        
                                    </div>
                                    <!--blood addition--->

                                  
            <div class="col l12 m12 s12">
             
                    <ul class="collection with-header">
                            <li class="collection-header blue">
                                <h5 class="white-text">Add Blood</h5>
                            </li>
                            </ul>
                            <!--form goes here-->
                            <section class="section-book z-depth-5" >
   
     <div class="register">
       <div class="register_form">
         <form action="admin.php"  method="post" class="form" id="form1" enctype="multipart/form-data">  <!--this is necessary of insertion of data i.e image type data-->
          
           <div class="form_group">
             <input type="text" class="form_input" placeholder="BLOOD GROUP" id="bg" name="bloodgroup" required>
             <label for="bg" class="form_label">BLOOD GROUP</label>
           </div>
           <div class="form_group">
             <input type="text" class="form_input" placeholder="BLOOD QUANTITY" id="bq" name="bloodquantity" required>
             <label for="bq" class="form_label">BLOOD UNIT</label>
           </div>
          
          


           <div class="form_group">
             <button class="btn btn-green" name="insert">Insert Blood to Stock</button>
           </div>
    
         </form> </div>

     </div>
   
</section>
                            </ul>
                            </div>
                            <!--add blood---->
                           <?php
                         if(isset($_POST['insert'])){
                              $bg = mysqli_real_escape_string($conn,$_POST['bloodgroup']);
                              $bq= mysqli_real_escape_string($conn,$_POST['bloodquantity']);
                              $sql = "SELECT * FROM stock WHERE  bloodgroup='$bg'";
                              $result = mysqli_query($conn,$sql);
                              
                              if($row=mysqli_fetch_array($result)){
                               $av= $row['available'];
                               
                                $add = "UPDATE stock SET available=$av+$bq WHERE  bloodgroup='$bg' ";
                                mysqli_query($conn,$add);
                                echo '<script>
                                alert("BLOOD STOCK UPDATED SUCCESSFULLY");
                                window.location="admin.php";
                                
                                </script>';


                              }else{
                                echo '<script>
                                alert("Updation failed");
                                window.location="admin.php";
                                
                                </script>';

                              }

                              

                           }
                            
                            
                        ?>
                            
                          









                                    <!--blood addition-->

                                

  
                                  
                                </div>
                            </div>
 

   <!--for sending messages icons-->
   <div class="fixed-action-btn">
        <a href="send_message.php"id="menu" class="btn-floating btn-large red white-text  tooltipped" data-tooltip="Send Messages" data-position="left"><i class="material-icons">edit</i></a>
    </div>
    <!--tool tips-->
    <!--this is for chart-->
    <?php
    
    $sql = "SELECT * FROM stock";
    $result=mysqli_query($conn,$sql);
  
    $bloodgroup='';
   
    
   
    while($row=mysqli_fetch_array($result)){
     
    $bloodgroup= $bloodgroup.'"'.$row['bloodgroup'].'",';
   

   
    
    }
  
    
   
   
   
   
   
    
    
    ?>
    <!--this is for chart-->
      <script>
      
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, {
      inDuration:300,
      outDuration:250,
      position:'left'
    });
  });
      
      
      </script>



       <!--tool tips-->


        
                        </main>

                        <!--Feature dictionary starts-->

                  


                        <!--Feature Dictionary ends--->


         <!---INIT MODAL-->
         <script>
           document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {
      
      inDuration:250,
      outDuration:250
  
    });
  });
         </script>
        
         

           

      <!--JavaScript at end of body for optimized loading-->
      <script src="js/jquery.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      
      <script>
          $(document).ready(function(){
              $('.dropdown-trigger').dropdown({
                  constrainWidth:false,
                  allignment:'bottom',
                  coverTrigger:false//this will keep the dropdown down the trigger
              });

          });
      </script>

      <!--activate side nav-->
      <script>
       document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {
      edge:'left',
      inDuration:250,
      outDuration:200,
      
    });
  });
      
      </script>
      
      <!--initialization of collapsible header-->
            
            <script>
            
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.collapsible');
                var instances = M.Collapsible.init(elems, {
                  accordion:true,
                  inDuration:300,
                  outDuration:300
                });
              });
            </script>



<script>
                    //chart options

const options ={
  chart:{
    height:310,
    width:'100%',
    type:'donut',
    background:'#000',
    foreColor: '#fff'
  },
  labels:[<?php echo $bloodgroup;?>],
  series:[53,52,52,52,60,52,52,52,52,52,52,52,52,52,52,52]
 
 


 

};


//init chart
const chart = new ApexCharts(document.querySelector('#chart'),options);


//render
chart.render();
                    
                    
                    </script>

   
                  <!--Add blood to stock--->
                










                  <!--blood addition to stock finished-->
            
   
 
            

                  
   
                 
    </body>
  </html>







 