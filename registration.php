<?php
header('Content-type: text/html; charset=utf-8');
$login=$_POST['login'];
$pas=$_POST['password'];
$db=mysqli_connect('localhost', 'f0792351_test', '123', 'f0792351_test');
$query="INSERT INTO users (login, pas) VALUES ('$login', '$pas')";
$result=mysqli_query($db, $query);
if ($result)
header("Location: index.php");
mysqli_close($db);
?>
