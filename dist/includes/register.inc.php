<?php
 include_once 'connection.php';

if(isset($_POST['register'])){
   


    $name = mysqli_real_escape_string($conn,$_POST['name']);
    //upload profile img
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];//temporary location of the file
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    //allow specific file only

    $fileExt = explode('.', $fileName);//after punctuation check the extension
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    //upload ends
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $contact = mysqli_real_escape_string($conn,$_POST['contact']);
    $state = mysqli_real_escape_string($conn,$_POST['state']);
    $city = mysqli_real_escape_string($conn,$_POST['city']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $gender= mysqli_real_escape_string($conn,$_POST['gender']);
    
    $bloodgroup= mysqli_real_escape_string($conn,$_POST['bloodgroup']);
    $secretKey='6LdrH5sUAAAAANqyObvkC0oOToah_VaGmq99gM4U';
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP=$_SERVER['REMOTE_ADDR'];

    $url  ="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
    $response =file_get_contents($url);
    echo $response;


    //error handler
    //check for empty field
    if(empty($name) || empty($username)||  empty($pwd)|| empty($email)
    || empty($contact)|| empty($state)|| empty($city) || empty($dob)
    ||empty($gender)||empty($bloodgroup)){

        header("Location: ../register.php?register=empty");
        exit();

    }else{

        //check if input character are valid
        if(!preg_match("/^[a-zA-Z ]*$/",$name)||!preg_match("/^[a-zA-Z ]*$/",$state )
        ||!preg_match("/^[a-zA-Z ]*$/",$city)){

            header("Location: ../register.php?register=invalid");
            exit();

        }else{
            if(in_array($fileActualExt,$allowed)){

                if($fileError === 0){

                    if($fileSize < 1000000){
                        //prevent duplicacy

                        $fileNameNew = uniqid('',true).".". $fileActualExt;//create unique id
                        $fileDestination = '../uploads/'. $fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                       

                    }else{
                        echo '<script>
                        alert("Your img is too big");
                        window.location="../register.php";
                        
                        </script>';
    

                    }

                }else{
                    echo '<script>
                    alert("There was an error uploading your file");
                    window.location="../register.php";
                    
                    </script>';

                }

            }else{
                echo '<script>
                alert("You can not upload image of this type");
                window.location="../register.php";
                
                </script>';
            }if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

                header("Location: ../register.php?register=invalid email");
                exit();

            }else{
                //check the existing user name inside database
                $sql ="SELECT * FROM users WHERE user_username='$username'";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck >0){
                    header("Location: ../register.php?register=user name taken");
                    exit();

                }else{
                    //Hashing the password
                    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
                    //insert the user into the database
                   $sql ="INSERT INTO `users` (`user_id`, `user_name`, `img`,`user_username`, 
                   `user_pwd`, `user_email`, `user_contact`, `user_state`, `user_city`, 
                   `user_dob`, `user_gender`, `user_bg`) VALUES ('','$name', '$fileNameNew', '$username', '$hashedPwd', 
                   '$email', '$contact', '$state', '$city', '$dob', '$gender', '$bloodgroup');";
                   mysqli_query($conn,$sql);
                   echo' <script>
                   alert("You have registered successfully");
                   window.location="../login.php";
              
             </script>';
                    
                    
                     exit();



                }
            }
        }


    }
}

else{
    header("Location: ../register.php");
    exit();
}


?>