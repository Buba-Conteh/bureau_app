<?php require('dbconn.php');

$id=$_GET['id'];
// var_dump($id);

$customers=$pdo->query("SELECT * FROM customers WHERE customer_id=$id");

$customers=$customers->fetch(PDO::FETCH_ASSOC);

var_dump($customers);