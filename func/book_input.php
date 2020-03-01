<?php
include('../config/config.php');
session_start();
    $c_id = 1;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $drop_loc = mysqli_real_escape_string($connect, $_POST['d_loc']);
    $time = mysqli_real_escape_string($connect, $_POST['time']);
    $date = mysqli_real_escape_string($connect, $_POST['date']);

    $sql1 = "select email from volunteer_details where '$time' between service_time and available_time";

    $row = mysqli_query($connect,$sql1);

    while ($result2=mysqli_fetch_assoc($row)) {
        $vid = $result2['email'];
        $query1 = "INSERT INTO temp(c_id,v_id,email,b_id,date,service_time,d_loc,random_number)VALUES(?,?,?,?,?,?,?,?)";
        $stmt = $connect->prepare($query1);
        $myNull = NULL;
        $v = 12;
        $stmt->bind_param('ddsdsssd', $c_id,$v, $vid, $myNULL, $date, $time,$drop_loc,$myNULL);

        if ($stmt->execute()) {
            echo "<script>alert('Member added')</script>";
            echo "<script>window.location.replace('../pages/start_cust.php')</script>";
        } else {
            echo "<script>alert('Member insertion failed !!')</script>";
            error_log($stmt->error);
            echo "<script>window.location.replace('../pages/cust_next.php')</script>";
        }
    }
}