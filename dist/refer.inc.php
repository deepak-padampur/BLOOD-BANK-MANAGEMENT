<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    

<?php
use PHPMailer\PHPMailer\PHPMailer;
session_start();
include 'includes/connection.php';



if(isset($_POST['refer']))

{

     
    $name =$_POST['name'];
    $email =$_POST['email'];
    $sender = $_SESSION['u_name'];

     //file attachment
    $file = $_FILES['attachment'];
    $fileName = $_FILES['attachment']['name'];
    $fileTmpName = $_FILES['attachment']['tmp_name'];
    $fileSize = $_FILES['attachment']['size'];
    $fileError = $_FILES['attachment']['error'];
    $fileType = $_FILES['attachment']['type'];


    $fileExt =explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','pdf','png');


    

 
   

       if(in_array($fileActualExt,$allowed)){

        if($fileError === 0){
            if($fileSize<50000000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'files/'.$fileNameNew;
                $success= move_uploaded_file($fileTmpName,$fileDestination);
                 $sql = "INSERT INTO `referal`(`id`,`sender`, `referal`, `email`, `attach`) VALUES ('','$sender','$name','$email','$fileNameNew');";
                 mysqli_query($conn,$sql);
                if($success){
                    include "PHPMailer/PHPMailer.php";
                    include "PHPMailer/Exception.php";
                      include "PHPMailer/SMTP.php";
               
                      $mail = new PHPMailer();
                      $mail->Host ="smtp.gmail.com";
               
                      $mail->SMTPAuth = true;
                      $mail->USERNAME ="deepaknit028@gmail.com";
                      $mail->Password ="CHHANDACHARAN";
                      $mail->SMTPSecure ="TLS";
                      $mail->Port = 587;
                      $mail->addAddress($email);
                      
                      $mail ->setFrom("deepaknit028@gmail.com","BLOOD BANK");
                      $mail->Subject ="Be a Blood Donor And Save Life";
                      $mail->isHTML(true);
                    
                        
                     
                    
                      $img =$_SESSION['u_img'];
                   
                      if(isset($_SESSION['u_name'])){

            
                    
                    $mail->Body ="
                         <div class=\'container\'>
                         <div class=\'row'\>
                         <div class=\'card-panel'\>
                         <p>Hello $name.Your Friend $sender  has suggested your name to become a 
                         Blood Donor.We need some emergency Blood.So Save A life.For Furthur Query Visit our site.
                         <a href=\"localhost/demo/dist\">link</a>
                         <img  src=\'img/ $img \' alt=\"photo\" width=\"30\" height=\"30\" />
                         
                         </p>
                         </div>
                         
                         </div>
                         </div>';
                      <br>;
                        Your Friends Details below:
                        
                        
                         <img  src=\"img/user.jpg\" alt=\"photo\" width=\"30\" height=\"30\" class=\"img-responsive circle\" />
                      
                        With Regards,<br>
                        BLOOD BANK MANAGEMENT SYSTEM
                    
                        ";
                      
                      }
                 
                      if($mail->send()){
                       echo '<div class="progress">
                    <div class="indeterminate"></div>
                    </div>';
                        echo '<script>
                        alert("YOUR REFERAL SENT SUCCESSFULLY");
                        window.location="./user.php";
                    </script>';
                      }else{
                          echo "something went wrong";
                      }
                }

            }else{
                echo "You file is too big";
            }

        }else{
            echo "There was an error uploading the file";
        }

       }else{
           echo "you can not upload file of this type";
       }




}



?>