<?php
include "includes/connection.php";
$id=$_GET['id'];
mysqli_query($conn,"update `files` set status='no' where user_id=$id");
?>
<script type="text/javascript">
window.location="admin.php";

</script>