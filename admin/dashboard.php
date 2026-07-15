<?php

session_start();

if($_SESSION['role']!="superadmin"){

    header("location:../login.php");

}

?>


<!DOCTYPE html>
<html>

<head>

<title>
Admin Dashboard
</title>

</head>


<body>


<h1>
Welcome Superadmin
</h1>


<h2>
<?php echo $_SESSION['nama']; ?>
</h2>


<p>
PeopleSync Admin Panel
</p>


<a href="../logout.php">
Logout
</a>


</body>

</html>