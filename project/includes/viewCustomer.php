<?php require('dbconn.php');

$id=$_GET['id'];

$customers=$pdo->query("SELECT * FROM customers WHERE customer_id=$id");

$customers=$customers->fetch(PDO::FETCH_ASSOC);

