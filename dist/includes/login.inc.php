
    


<?php
  

session_start();

if(isset($_POST['login'])){
    include_once 'connection.php';
    $username= mysqli_real_escape_string($conn,$_POST['uname']);
    $password = mysqli_real_escape_string($conn,$_POST['pwd']);



    //Error Handlers
    //check for empty field
    if(empty($username)|| empty($password)){

        echo '<script>
        alert("fill Username or password");
        window.location="../login.php";
    </script>';

    }else{
        //check existing user name
        $sql = "SELECT * FROM users WHERE user_username='$username' OR user_email='$username'";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
          echo' <script>
              alert("username does not exists");
              window.location="../login.php";
         
        </script>';

        }else{
            if($row = mysqli_fetch_assoc($result)){
                //check for database password

                //dehashing the password
                $hashedPwdCheck = password_verify($password,$row['user_pwd']);
                if( $hashedPwdCheck == false){
                    echo '<script>
                        alert("incorrect password");
                        window.location="../login.php";
                    </script>';
                  
                   
        
                }elseif($hashedPwdCheck == true){
                    //login the user here
                    //create a session 
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_name'] = $row['user_name'];
                    $_SESSION['u_username'] = $row['user_username'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_img'] = $row['img'];
                    $_SESSION['u_contact'] = $row['user_contact'];
                    $_SESSION['u_state'] = $row['user_state'];
                    $_SESSION['u_city'] = $row['user_city'];
                    $_SESSION['u_dob'] = $row['user_dob'];
                    $_SESSION['u_bg'] = $row['user_bg'];
                    $_SESSION['u_gender'] = $row['user_gender'];


                    header("Location: ../user.php?login=success");
                    exit();
                   

                }

            }
        }
    }

}else{
    header("Location: ../login.php?login=error");
    exit();
}

?>