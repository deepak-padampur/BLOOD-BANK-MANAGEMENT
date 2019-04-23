<?php
session_start();
include_once 'connection.php';


if(isset($_POST['adminlogin'])){
    $username = mysqli_real_escape_string($conn,$_POST['uname']);
    $password = mysqli_real_escape_string($conn,$_POST['pwd']);


    if(empty($username) || empty($password)){
        echo '<script>
        alert("fill Username or password");
        window.location="../adminlogin.php";
    </script>';

    }else{
        //check existing username
        $sql = "SELECT * FROM `admin` WHERE username='$username'";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck<1){
            echo' <script>
            alert("invalid username or password");
            window.location="../adminlogin.php";
       
      </script>';
        }else{
            if($row=(mysqli_fetch_array($result)))

           {
               if($password == $row['pass']){
                   $_SESSION['u_admin']=$row['username'];
                   $_SESSION['u_email']=$row['email'];
            
                    header("Location: ../admin.php?login=success");
                    exit();
                
               }else{
                header("Location: ../adminlogin.php?login=password");
                exit();

               }
           }

        }
    }

 
}else{
    header("Location: ../adminlogin.php?login=error");
    exit();
}



?>