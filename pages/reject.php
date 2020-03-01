<?php
include('../config/config.php');
$id = $_GET['email'];

$query = "DELETE FROM temp WHERE v_id = 12;";
if(mysqli_query($connect,$query)){
    echo "Account has been rejected.";
}else{
    echo "Unknown error occured. Please try again.";
}

?>
