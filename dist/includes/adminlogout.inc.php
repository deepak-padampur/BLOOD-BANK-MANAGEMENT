<?php
include 'connection.php';
if(isset($_POST['adminlogout'])){
    session_start();
    session_unset();
    session_destroy();
    echo "<script>
    window.location = '../index.php';
    alert('you have successfully logout');
    
    </script>";
 
   
    exit();
}

?>