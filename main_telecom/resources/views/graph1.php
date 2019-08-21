<?php
$connect = mysqli_connect("192.168.1.90", "seif@localhost", "123456789", "speech");
$query1 = "SELECT name,tf FROM `products`";
$result1 = mysqli_query($connect1, $query1);
$query2 = "SELECT name,df FROM `products`";
$result2 = mysqli_query($connect1, $query2);
$query3 = "SELECT name,tf,df FROM `products`";
$result3 = mysqli_query($connect1, $query3);

?>


