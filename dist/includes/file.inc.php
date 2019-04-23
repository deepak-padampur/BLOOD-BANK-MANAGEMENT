<?php
session_start();
include 'connection.php';

?>

<?php
$uploader = $_SESSION['u_id'];

if(isset($_POST['upload'])){


    
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
                $fileDestination = '../health/'.$fileNameNew;
                $success= move_uploaded_file($fileTmpName,$fileDestination);
                     //check the existing user name inside database
                     $sql ="SELECT * FROM files WHERE user_id='$uploader';";
                     $result = mysqli_query($conn,$sql);
                     $resultCheck = mysqli_num_rows($result);
                     if($resultCheck <1){
                        $sql = "INSERT INTO `files`(`id`,`user_id`, `file`, `status`) VALUES ('','$uploader','$fileNameNew','no');";
                        mysqli_query($conn,$sql);
                        if($success){
                            
                        echo '<script>
                        alert("Your file uploaded successfully");
                        window.location="../user.php";
                    </script>';
        
        
                        }

                     }else{
                        echo '<script>
                        alert("Your have already uploaded. Wait for approval from admin");
                        window.location="../user.php";
                    </script>';

                     }
           

            }else{

                echo '<script>
                alert("Your file size is too big");
                window.location="../user.php";
            </script>';

            }

        }else{
            echo '<script>
            alert("Some thing went wrong please try again");
            window.location="../user.php";
        </script>';

        }

     }else{
        echo '<script>
        alert("YOU can not upload files of this type");
        window.location="../user.php";
    </script>';
     }

}else{
    header("Location: ../user.php");
    exit();
}
      







?>