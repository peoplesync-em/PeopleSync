<?php

session_start();

include "../php/config.php";


if(!isset($_SESSION['role']) || $_SESSION['role']!="superadmin"){

    header("location:../login.php");
    exit;

}


// Total karyawan

$total_karyawan = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM users"
);

$total = mysqli_fetch_assoc($total_karyawan);


// Supervisor

$supervisor = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total 
     FROM users 
     WHERE role='supervisor'"
);

$total_supervisor = mysqli_fetch_assoc($supervisor);


// Karyawan

$karyawan = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total 
     FROM users 
     WHERE role='karyawan'"
);

$total_karyawan_role = mysqli_fetch_assoc($karyawan);


// Data user terbaru

$data_user = mysqli_query(
    $conn,
    "SELECT * FROM users ORDER BY id DESC"
);


?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>PeopleSync Admin Dashboard</title>

<link rel="stylesheet" href="../css/dashboard.css">

</head>


<body>


<div class="sidebar">


    <div class="brand">

        <img src="../assets/logo1.png">

        <h2>
            PeopleSync
        </h2>

    </div>



    <ul>

        <li>Dashboard</li>

        <li>Data Karyawan</li>

        <li>Absensi</li>

        <li>Payroll</li>

        <li>Cuti</li>

        <li>Task Management</li>

        <li>Laporan</li>


    </ul>


</div>




<div class="main">


<header>


<h2>
Dashboard
</h2>


<div class="profile">

<?php echo $_SESSION['nama']; ?>

</div>


</header>



<section class="cards">


<div class="card">

<h3>
<?php echo $total['total']; ?>
</h3>

<p>
Total User
</p>

</div>


<div class="card">

<h3>
<?php echo $total_supervisor['total']; ?>
</h3>

<p>
Supervisor
</p>

<p>
Kehadiran
</p>

</div>


<div class="card">

<h3>
<?php echo $total_karyawan_role['total']; ?>
</h3>

<p>
Karyawan
</p>

<p>
Cuti Pending
</p>

</div>


<div class="card">

<h3>
15
</h3>

<p>
Task Aktif
</p>

</div>


</section>



<div class="content-box">


<h2>
Aktivitas Terbaru
</h2>


<table>

<tr>

<th>
Nama
</th>

<th>
Aktivitas
</th>

<th>
Status
</th>

</tr>


<?php while($user=mysqli_fetch_assoc($data_user)){ ?>

<tr>

<td>
<?php echo $user['nama']; ?>
</td>


<td>
<?php echo $user['role']; ?>
</td>


<td>
Aktif
</td>


</tr>


<?php } ?>


</table>


</div>


</div>


</body>

</html>