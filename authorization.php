<?php
header('Content-type: text/html; charset=utf-8');
session_start();
$login=$_POST['login'];
$pas=$_POST['password'];
$db=mysqli_connect('localhost', 'f0792351_test', '123', 'f0792351_test');
$query="SELECT * FROM users WHERE login='$login' AND BINARY pas='$pas'";
$result=mysqli_query($db, $query);
if (mysqli_num_rows($result))
$_SESSION['login']=$login;
else
$_SESSION['login']='er login';
header("Location: index.php");
mysqli_close($db);
?>
