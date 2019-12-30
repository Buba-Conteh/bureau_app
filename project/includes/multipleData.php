<?php
 require('dbconn.php');
// $users=$pdo->query("SELECT * FROM customers INNER JOIN transaction., currency ON customers.customer_id=currency.customer_id");
$users=$pdo->query("SELECT * FROM `customers` as cms , currency as crn where cms.id=crn.id order by cms.id");

// SELECT * FROM `customers` as cms , transaction as tns where cms.id=tns.customer_id order by tns.transaction_id

// var_dump($users);
$users=$users->fetchAll(PDO::FETCH_ASSOC);


foreach ($users as $user) {

    # code...
    echo $user['national_id'];
    echo "<br>";
}
var_dump($users);