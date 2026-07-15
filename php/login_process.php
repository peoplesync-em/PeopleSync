<?php

session_start();

include "config.php";


$username = $_POST['username'];
$password = $_POST['password'];



$query = mysqli_query(
    $conn,
    "SELECT * FROM users 
    WHERE username='$username' 
    AND password='$password'"
);



$data = mysqli_fetch_assoc($query);



if($data){


    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];



    if($data['role']=="superadmin"){

        header("location:../admin/dashboard.php");

    }


    else if($data['role']=="supervisor"){

        header("location:../supervisor/dashboard.php");

    }


    else if($data['role']=="karyawan"){

        header("location:../karyawan/dashboard.php");

    }


}

else{


    echo "
    <script>
    alert('Username atau password salah!');
    window.location='../login.php';
    </script>
    ";


}


?>