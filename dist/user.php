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
          
           
                <a href="" class="brand-logo center grey-text">USER | DASHBOARD</a>
                <a href="#" data-target="slide-out" class=" sidenav-trigger"><i class="material-icons grey-text">menu</i></a>
            
              <a href="" class="brand-logo dropdown-trigger right" data-target="dropdown1">
              <?php
              if(isset($_SESSION['u_name'])){
              
                
               echo "<img  src=\"./uploads/". $_SESSION['u_img']."\" alt=\"photo\" width=\"30\" height=\"30\" class=\"img-responsive circle\" />"; 
              }else{
                echo "<img  src='img/user.jpg' alt=\"photo\" width=\"30\" height=\"30\" />"; 
              }
              
              
              ?>
          
                    <i class="material-icons right black-text">arrow_drop_down</i>
                </a>
            </div>
        </nav>
    </div>
      
      
        
      
        <ul id="dropdown1" class="dropdown-content">
                   <li><a href="#modal1" class="black-text"> Update profile<i class="material-icons left">update</i> </a></li>
                 
                   <li class="divider"></li>
                   <li><a href="#!"  class="black-text">Change Password <i class="material-icons left">lock</i></a></li>
                   <li class="divider"></li>
                   <li>
                   <?php
                   if(isset($_SESSION['u_name'])){
                     echo' <form action="includes/logout.inc.php" method="POST">';
                      echo  '<button type="submit" name="logout"  style="backgroud:#fff;
                        border:none;">';echo"<span>logout</span>";echo'<i class="material-icons left">';echo"exit_to_app";echo"</i></a>";
                     echo '</form>';
                   }else{
                       echo '<a href="login.php"  class="black-text">Login <i class="material-icons left">exit_to_app</i></button>';
                   }
                   
                   ?>
                   </li>
           </ul>
           <!--side nav goes here-->
  
  
           <ul id="slide-out" class="sidenav sidenav-fixed collapsible">
    <li> 
     <div class="user-view">
  <div class="background">
  <img src="img/bg.jpg" alt="" class="responsive-img">  
  </div> 
    
      <a href="#name"><span class="black-text name"><?php if(isset($_SESSION['u_name'])){echo $_SESSION['u_name'];} 
      
      else echo "You are not logged in"?></span></a>
      <a href="#email"><span class="black-text email"><?php if(isset($_SESSION['u_name'])){echo $_SESSION['u_email'];} ?></span></a>
     
     </div>
    </li>
    
    
    <li><div class="collapsible-header black-text"><a href="#modal3" class="modal-trigger">Find Donor<i class="material-icons left">schedule</i></a></div></li>
    <li><div class="divider"></div></li>
    <li><div class="collapsible-header black-text"><a href="#con">Your contribution<i class="material-icons left">timeline</i></a></div></li>
    <li><div class="divider"></div></li>
    <li><div class="collapsible-header black-text"><a href="#pro"> Profile<i class="material-icons left">person</i></a></div></li>
    <li><div class="divider"></div></li>
   
    <li><div class="collapsible-header black-text"><a href="#">Notifications<i class="material-icons left">notifications_active</i><span class="new badge  black">
      <?php
      if(isset($_SESSION['u_name'])){
        echo '1';
      }else{
        echo '0';
      }
      ?>
    </span></a></div>
         <?php
         if(isset($_SESSION['u_name'])){
              //notify when the health card is not uploaded
              echo '<div class="collapsible-body"><a href="#modal1" class=" modal-trigger"><span>Health Certificate for Donor Approval &rarr;</span></a></div>';
         }else{

         }
        
         if(isset($_SESSION['u_name'])){
           $id=$_SESSION['u_id'];
           $sql = "SELECT * FROM files WHERE `user_id`='$id' AND `status`='yes'";
           $result = mysqli_query($conn,$sql);
           if(mysqli_num_rows($result)){
          
            echo '<div class="collapsible-body"><a><span>Congratulations You are now Certified</span></a></div>';
           }
         }
         
         ?>
    </li>
    <li><div class="divider"></div></li>
    <li><div class="collapsible-header black-text"><a href="#modal2" id="refer" class="modal-trigger">Refer Friends<i class="material-icons left">group_add</i></a></div></li>
    <li><div class="divider"></div></li>
  </ul>
  
  <!--side nav ends-->   <!-- Tap Target Structure -->
  
    

 <!--referal initiation-->



 

  <!--
    modal structure starts
  -->
  <div class="modal" id="modal1">
                            <div class="modal-content">
                                
                               
                                <div class="col l6 m6 s12">
                                        <div class="card hoverable z-depth-5">
                                          <blockquote class="card-title blue white-text flow-text center">
                                           UPLOAD HEALTH CERTIFICATE
                                          </blockquote>
                                         <div class="card-content z-depth-5">
                                          <form action="includes/file.inc.php"  method="post" enctype="multipart/form-data">

                                          <div class="input-field">
                                              <i class="material-icons prefix">attach_file</i>
                                           <input type="file" id="autocomplete-input1" class="autocomplete" name="attachment">
                                          
                                           <label for="autocomplete-input1">Health Certificate</label>
                                           </div>
                                          
                                         </div>
                                         <div class="card-action center">
                                           <button  class="waves-effect waves-light grey btn" name="upload">UPLOAD<i class="material-icons right">file_upload</i></button>
                                         </div>
                                        </form>
                                        </div>
                                       
                                      </div>
                            </div>
                           

                        </div>

                        <!--modal for referal-->
                        <div class="modal" id="modal2">
                            <div class="modal-content">
                                
                               
                                <div class="col l6 m6 s12">
                                        <div class="card hoverable z-depth-5">
                                          <blockquote class="card-title black white-text flow-text center">
                                           REFER A FRIEND
                                          </blockquote>
                                         <div class="card-content z-depth-5">
                                          <form action="refer.inc.php"  method="POST" enctype="multipart/form-data">

                                          <div class="input-field">
                                              <i class="material-icons prefix">person</i>
                                           <input type="text" id="autocomplete-input" class="autocomplete" name="name" required>
                                          
                                           <label for="autocomplete-input">Name</label>
                                           </div>
                                           <div class="input-field">
                                              <i class="material-icons prefix">mail</i>
                                           <input type="text" id="autocomplete-input2" class="autocomplete" name="email" required>
                                          
                                           <label for="autocomplete-input2">Email</label>
                                           </div>
                                           <div class="input-field">
                                              <i class="material-icons prefix">attach_file</i>
                                           <input type="file" id="autocomplete-input3" class="autocomplete" name="attachment" required>
                                          
                                           <label for="autocomplete-input3">Attachment</label>
                                           </div>
                                          
                                         </div>
                                         <div class="card-action center">
                                           <button  class="waves-effect waves-light grey btn" name="refer">Refer<i class="material-icons right">send</i></button>
                                         </div>
                                        </form>
                                        </div>
                                       
                                      </div>
                            </div>
                           

                        </div>




                        <div class="modal" id="modal3">
                            <div class="modal-content">
                                
                               
                                <div class="col l6 m6 s12">
                                        <div class="card hoverable z-depth-5">
                                          <blockquote class="card-title blue white-text flow-text center">
                                           FIND BLOOD DONOR
                                          </blockquote>
                                         <div class="card-content z-depth-5">
                                          <form action="user.php"  method="post" enctype="multipart/form-data">

                                        
                                           <!--material design of input field with select button-->


                                           <!----COMMENT THIS LATER--->

                                          
                                          <div class="input-field ">
                                           <select name="bg">
                                           <?php
                                           $bloodgroup=mysqli_query($conn,"SELECT bloodgroup FROM stock");
                                           while($row=mysqli_fetch_array($bloodgroup))
                                           {
                                             ?><option value="<?php echo $row['bloodgroup'];?>">
                                             <?php echo $row['bloodgroup'];?>
                                             </option><?php
                                           }?>
                                            
                                          </select>
                                                <label>REQUIRED BLOOD GROUP</label>
                                             </div>
                                          
                                          
                                          
                                        



                                           <!--material design of input field with select button-->
                                          
                                         </div>
                                         <div class="card-action center">
                                           <button  class="waves-effect waves-light grey btn" name="find">FIND<i class="material-icons right">find_replace</i></button>
                                         </div>
                                        </form>
                                        </div>
                                       
                                      </div>
                            </div>
                           

                        </div>
                        <!---INITIAL OF SELECT--->
                        <script>

                             document.addEventListener('DOMContentLoaded', function() {
                             var elems = document.querySelectorAll('select');
                             var instances = M.FormSelect.init(elems, {
                               classes:'',
                               dropdownOptions:{}
                             });
                               });
                        
                        
                        
                        </script>

                        <!---END SELECT--->
         <!--MODAL STRUCTURE ENDS--->

         <!---INIT MODAL-->
         <script>
           document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {
      
                  opacity:0.5,
                inDuration:250,
                OutDuration:250,
                preventScrolling:false,
                startingTop:'4%',
                endingTop:'10%'
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

                    <main>

                    <!--FIND DONOR FUNCTION-->
                    <?php
                    if(isset($_POST['find'])){
                      $bg = mysqli_real_escape_string($conn,$_POST['bg']);
                      if(!empty($bg)){
                        $sql = "SELECT *  FROM users WHERE user_bg='$bg'";
                        $file = mysqli_query($conn,"SELECT * FROM files");
                        $result=mysqli_query($conn,$sql);
                        $resultCheck = mysqli_num_rows($result);
                        if($resultCheck>0){

                              echo '<div class="container">';
                               echo '<div class="row">';
                              echo  '<div class="col l12 m12 s12">';
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

                               echo"</tr>";
                               while($row=mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td>";echo "<img id=\"zoom\" src=\"./uploads/".$row['img']."\" alt=\"photo\" width=\"30\" height=\"30\" class=\"img-responsive\" style=\"margin-top:-30px\" />";echo"</td>";
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

                               
                                echo"</tr>";
                                  }
                              
                              echo"</table>";
                              echo '</div>';
                              echo '</div>';
                              echo '</div>';
                              
                        }else{
                          echo' <script>
                          alert("BLOOD DONOR OF THIS BLOOD GROUP IS NOT AVAILABLE");
                          window.location="user.php";
                     
                    </script>';
                        }

                      }
                    }
                   
                    
                    
                    
                    
                    ?>
   



                    
                    <!--FIND DONOR FUNCTION-->
                     


                    <div class="container">
                         <div class="row">
                         <div class="col s12 m12 l12">
                         <div class="card-panel z-depth-5" id="pro">
                         
                         <div class="card-content">
                         <div class="card-title">
                         <blockquote class="flow-text">Your Profile</blockquote>
                      
                         </div>
        
          <div class="row valign-wrapper">
            <div class="card-image" style="margin-top:-460px">
         <?php
         
         if(isset($_SESSION['u_name'])){
              
                
          echo "<img  src=\"./uploads/". $_SESSION['u_img']."\" alt=\"photo\" width=\"100\" height=\"100\" class=\"img-responsive\" />"; 
         }else{
           echo "<img  src='img/user.jpg' alt=\"photo\" width=\"50\" height=\"50\" />"; 
         }
         ?>
             <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              
               <?Php
               $regs = mysqli_query($conn,'SELECT * FROM users');
               if(isset($_SESSION['u_name'])){
                 echo "<ul>";
                 echo "<li>"; echo   "<blockquote>USERID:".$_SESSION['u_id']."</blockquote>";echo"</li>";
                echo"<li>";echo'<div class="divider"></div>';echo"</li>";
                 echo "<li>"; echo    "<blockquote>NAME:".$_SESSION['u_name']."</blockquote>";echo"</li>";
                 echo"<li>";echo'<div class="divider"></div>';echo"</li>";
                 echo "<li>"; echo   "<blockquote>EMAIL:".$_SESSION['u_email']."</blockquote>"; echo"</li>";
                 echo"<li>";echo'<div class="divider"></div>';echo"</li>";
                 echo "<li>"; echo   "<blockquote>CONTACT:".$_SESSION['u_contact']."</blockquote>"; echo"</li>";
                 echo"<li>";echo'<div class="divider"></div>';echo"</li>";
                 echo "<li>"; echo   "<blockquote>STATE:".$_SESSION['u_state']."</blockquote>"; echo"</li>";
                 echo"<li>";echo'<div class="divider"></div>';echo"</li>";
                 echo "<li>"; echo   "<blockquote>CITY:".$_SESSION['u_city']."</blockquote>"; echo"</li>";
                 echo"<li>";echo'<div class="divider"></div>';echo"</li>";
                 echo "<li>"; echo   "<blockquote>DOB:".$_SESSION['u_dob']."</blockquote>"; echo"</li>";
                 echo"<li>";echo'<div class="divider"></div>';echo"</li>";
                 echo "<li>"; echo   "<blockquote>BLOOD GROUP:".$_SESSION['u_bg']."</blockquote>"; echo"</li>";
                 echo"<li>";echo'<div class="divider"></div>';echo"</li>";
                 echo "<li>"; echo   "<blockquote>GENDER:".$_SESSION['u_gender']."</blockquote>"; echo"</li>";
                 echo"<li>";echo'<div class="divider"></div>';echo"</li>";
                 

                 echo "</ul>";
                 echo '<a href="" class="waves-effect waves-light btn right">UPDATE</a>';
               }else{
                 echo "<blockquote> Please Login to Access This Page</blockquote>";
               }
               
               ?>
             
            </div>
          </div>
      
                         </div>
                         </div>
                         </div>
                        
                         </div>
                         </div>

                         <div class="container">
                           <div class="row">
                             <div class="col s12 m12 l12">
                                <!--chart of donor defining his contribution-->
                                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                                      <script src="chart.js"></script>
                                     <div class="card-panel z-depth-5" id="con">
                                       <div class="card-content">
                                         <div class="card-title">
                                           <blockquote class="flow-text">Your Contribution</blockquote>
                                         </div>
                                        <?php
                                        if(isset($_SESSION['u_name'])){
                                          echo ' <div id="chart"></div>';
                                        }else{
                                          echo '';
                                        }?>
                                       </div>
                                     </div>
                         </div>


                    
                        

                    </main>
                    <script>
                    //chart options

const options ={
  chart:{
    height:450,
    width:'100%',
    type:'line',
    background:'#bb0a1e',
    foreColor: '#fff'
  },
  series:[{
    name:'Blood Unit',
    data:[0,0,0.5,0,0,1,0,0,0.7,0,0,0]
  }],
  xaxis:{
    categories:['Jan','feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec']
  }

};


//init chart
const chart = new ApexCharts(document.querySelector('#chart'),options);


//render
chart.render();
                    
                    
                    </script>
   
                 
    </body>
  </html>







 