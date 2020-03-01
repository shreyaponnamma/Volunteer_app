<?php
include '../config/config.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from login where email ='$email' and password = '$password'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $email = $row['email'];
        $username = $row['username'];
        $role = $row['role'];

        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
    }

    if ($role == 'cust') {
        header('location:../pages/book_page.php');
        exit();
    } else if ($role == 'vol') {
        header('location:../pages/volunteer.php');
        exit();
    } else if ($role == 'admin') {
        header('location:../pages/home.php');
        exit();
    } else {
        header('location:../');
    }
    //}

}

