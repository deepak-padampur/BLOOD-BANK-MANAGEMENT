<?php
require_once "functions.php";

if(isset($_GET['EMAIL']) && isset($_GET['token'])){
  
    $conn = new mysqli('localhost','root','','bloodbank');
    $email=$conn->real_escape_string($_GET['EMAIL']);
    $token =$conn->real_escape_string($_GET['token']);

    $sql =$conn->query("SELECT `user_id` FROM users WHERE user_email='$email' AND token='$token' AND token<>'' AND tokenExpire >NOW()");

    if($sql->num_rows >0){
  
   $newPassword= generateNewString();
   $newPasswordEncrypted =password_hash($newPassword,PASSWORD_DEFAULT);
  
   
   $conn->query("UPDATE users SET token='',user_pwd=$newPasswordEncrypted WHERE user_email=$email;");

   echo "Your new Password Is $newPassword <br><a href='login.php'> Click Here To Login</a>";

    }else

    redirectToLoginPage();

} else{
    redirectToLoginPage();
}

?>