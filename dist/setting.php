     
<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once "functions.php";





if (isset($_POST['email'])){
    $conn = new mysqli('localhost','root','','bloodbank');
    $email=$conn->real_escape_string($_POST['email']);
    $sql = $conn->query("SELECT `user_id` FROM users WHERE user_email='$email'");
    if($sql->num_rows>0){
      $token=generateNewString();
 $conn->query("UPDATE users SET  token='$token',tokenExpire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE user_email='$email'");


                 include_once "PHPMailer/PHPMailer.php";
                     include_once "PHPMailer/Exception.php";
                 include_once "PHPMailer/SMTP.php";


                 $mail = new PHPMailer();
                 $mail->Host ="smtp.gmail.com";

                 $mail->SMTPAuth = true;
                 $mail->USERNAME ="deepaknit028@gmail.com";
                 $mail->Password ="CHHANDACHARAN";
                 $mail->SMTPSecure ="TLS";
                 $mail->Port = 587;
                 $mail->addAddress($email);
                 $mail ->setFrom("deepaknit028@gmail.com","BLOOD BANK");
                 $mail->Subject ="Reset your password to login into BLOOD BANK MANAGEMENT SYSTEM";
                 $mail->isHTML(true);
                 $mail->Body ="
                 '<p>We receive a password reset request.The link to reset your password is below.If you did not make
     this request you can ignore it.</p>';<br>
 
                  Inorder to Reset Your Password , Please Click  on the link below:<br><br>
                 <a href='http://localhost/demo/dist/resetPassword.php?EMAIL=$email&token=$token'>
                 http://localhost/demo/dist/resetPassword.php?EMAIL=$email&token=$token
                 </a><br><br>
                 
                 

                 With Regards,<br>
                 BLOOD BANK MANAGEMENT
                 ";
                 if($mail->send())
                 exit(json_encode(array("status"=>1,"msg"=>'Please Check Your Email Inbox')));
       else
        exit(json_encode(array("status"=>1,"msg"=>'Something Wrong Happened! Plase Try Again')));
    }else
exit(json_encode(array("status"=>0,"msg"=>'Member With This Email Does Not Exists!')));
}
?>


















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORGOT PASSWORD SYSTEM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:100px">
    <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3" align="center">
    
  <img src="img/brand1.jpg"><br><br>
  <input  class="form-control" id="email" placeholder="Your Email Address"><br>
  <input type="button" class="btn btn-primary" value="Reset Password">
  <br><br>
  <p id="response"></p>
    
    </div>
    </div>
    
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
<script type="text/javascript">

var email=$("#email");

$(document).ready(function(){
$('.btn').on('click',function(){
    if(email.val()!=""){
                email.css('border','1px solid green');


                $.ajax({

                    url:'setting.php',
                    method:'POST',
                    dataType:'json',
                    data:{
                        email: email.val()
                    },success: function (response){
                        if (!response.success)
                          $('#response').html(response.msg).css('color',"red");
                          else
                          $('#response').html(response.msg).css('color',"green");
                        
                    }
                });
                }
                else
                email.css('border','1px solid red');
});

});

</script>
</body>
</html>