<?php
include 'includes/connection.php';
session_start();

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
      <title>ADMIN DASHBORD</title>
  

    </head>

<body>

            <div class="container">
            <div class="row">
            <div class="col l12 m6 s12">
            
            <div class="card-panel">
                <ul class="collection with-header">
                            <li class="collection-header blue">
                                <h5 class="white-text">SEND MESSAGE</h5>
                            </li>
                            <!--message content goes here-->
                            <section class="section-message" >
   <div class="row">
     <div class="register">
       <div class="register_form">
         <form action=" "  method="post" class="form" id="form1" enctype="multipart/form-data">  <!--this is necessary of insertion of data i.e image type data-->
           <div class="form_group">
           <table class="table table-bordered">
           <tr>
           <td>
            <!--<input type="text" class="form_input" placeholder="BOOKNAME" id="bname" name="bookname" required>
             <label for="bname" class="form_label"  >BOOKNAME</label>-->
             <!--select data from database-->
             <select name="users" id="" class="form-control" >
             <?php
             $sql = "SELECT * FROM users";
             $recv=mysqli_query($conn,$sql);
             while($row=mysqli_fetch_array($recv))
             {
                ?><option value=" <?php echo $row['user_name'];?>">

                <?php echo $row['user_name']."(".$row['user_id'].")";?>
                </option><?php
             }
             
             ?>
          
             </select>
             </td>
             </tr>
             <tr>
             <td>
               <input type="text" class="form-control" placeholder="ENTER TITLE" id="title1" name="title" required>
             <label for="title1" class="form_label"  >ENTER TITLE</label>
             </td>
             </tr>
             <tr>
             <td>
             TYPE MESSAGE HERE....
          <textarea name="msg" id="" cols="30" rows="10" class="form-control" >
          </textarea>
             </td>
             </tr>
             <tr>
             <td>
             <div class="form_group">
             <button class="btn btn--green " name="submit2">send message</button>
           </div>
             </td>
             </tr>
             </table>
           </div>
         
          
    
         </form> </div>

     </div>
   </div>
</section>
</div>
            
            
            
            </div>
            
            </div>
            
            </div>
    
</body>

</html>