<?php

session_start();

if(isset($_GET['user_id'])){



    $userId = $_GET['user_id'];
$firstName = $_GET['first_name'];
$lastName = $_GET['last_name'];

// var_dump($firstName);
$_SESSION['user_id_delete'] = '1';
$_SESSION['user_id'] = $userId;
$_SESSION['first_name'] = $firstName;
$_SESSION['last_name'] = $lastName;
header('location: users.php');
}
    // $_SESSION['customer_verlidation']="deleting failed: check your internet connection";
    // header('location: users.php');
    // die;



    // $_SESSION['first_name'];



if(isset($_GET['transaction_id'])){
    $_SESSION['transaction_id']=$_GET['transaction_id'];
    $_SESSION['confirm_delete_transaction'] = '1';
    header('location:transaction.php');

}

if(isset($_GET['customer_id'])){



    $customerId = $_GET['customer_id'];
$firstName = $_GET['first_name'];
$lastName = $_GET['last_name'];

// var_dump($firstName);
$_SESSION['customer_id_delete'] = '1';
$_SESSION['customer_id'] = $customerId;
$_SESSION['first_name'] = $firstName;
$_SESSION['last_name'] = $lastName;
header('location: customers.php');
}


    // $_SESSION['first_name'];



if(isset($_GET['transaction_id'])){
    $_SESSION['transaction_id']=$_GET['transaction_id'];
    $_SESSION['confirm_delete_transaction'] = '1';
    header('location:transaction.php');

}


if(isset($_GET['expense_id'])){

    //  dd($_GET['expense_id']);

    $expenseId = $_GET['expense_id'];
// $firstName = $_GET['first_name'];
// $lastName = $_GET['last_name'];

// var_dump($firstName);
$_SESSION['delete'] = '1';
$_SESSION['expense_id'] = $expenseId;
// $_SESSION['first_name'] = $firstName;
// $_SESSION['last_name'] = $lastName;
header('location: expenses.php');
die;
}


    // $_SESSION['first_name'];



if(isset($_GET['transaction_id'])){
    $_SESSION['transaction_id']=$_GET['transaction_id'];
    $_SESSION['confirm_delete_transaction'] = '1';
    header('location:transaction.php');

}

if(isset($_GET['debtor_id'])){
    $_SESSION['debtor_id']=$_GET['debtor_id'];
    $_SESSION['confirm_delete_debtor'] = '1';
    $_SESSION['first_name'] = $firstName;
$_SESSION['last_name'] = $lastName;
    header('location:debtors.php');
    die;
}
var_dump($_GET);