<?php
    include_once("connect.php");
    $id=$_REQUEST['id'];
    echo $id;
    
    $delete_query="DELETE FROM messages WHERE id=$id";
    $result=mysqli_query($link, $delete_query);
    
?>
