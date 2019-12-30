<?php

session_start();

require('includes/dbconn.php');

require('includes/functions.php');

if(isset($_GET['customer_id_delete'])){
$customerId = $_GET['customer_id_delete'];
$firstName = $_GET['first_name'];
$lastName = $_GET['last_name'];
// dd($customerId );
// dd(deleteCustomer($pdo, $customerId));

// $statement = deleteCustomer($pdo, $customerId);

$st = $pdo->exec("delete from customers where id = $customerId" );

if($st) {
   
    $_SESSION['delete_result'] = 'success';
    $_SESSION['first_name'] = $firstName;
    $_SESSION['last_name'] = $lastName;


    header('location: customers.php');
    
}
$_SESSION['customer_verlidation'] = 'failed to delete';
echo "Customer was not deleted successfully";
}

if(isset($_GET['user_id_delete'])){
$userId = htmlspecialchars($_GET['user_id_delete']);
$firstName =  htmlspecialchars($_GET['first_name']);
$lastName =  htmlspecialchars($_GET['last_name']);
// dd($userId);
// dd(deleteCustomer($pdo, $customerId));

// $statement = deleteCustomer($pdo, $customerId);

$st = $pdo->exec("DELETE FROM users WHERE id = '$userId'" );

if($st) {
   
    $_SESSION['massage'] = 'user deleted';
    $_SESSION['first_name'] = $firstName;
    $_SESSION['last_name'] = $lastName;


    header('location: users.php');
    die;
}
$_SESSION['customer_verlidation'] = 'failed to delete';
echo "Customer was not deleted successfully";
}


if(isset($_GET['expense_id'])){
$expenseId = $_GET['expense_id'];

$st = $pdo->query("delete from expenses where `id` ='$expenseId'" );
$st=$st->execute();
// dd($st);
if($st) {
   
    $_SESSION['massage'] = 'success';
  

    header('location: expenses.php');
    die;
    
}
$_SESSION['customer_verlidation'] = 'failed to delete';
header('location: transaction.php');
die;
echo "Customer was not deleted successfully";
}



if(isset($_GET['transaction_id'])){
$transactionId = $_GET['transaction_id'];
$customerId;

$st = $pdo->query("DELETE from transaction WHERE `id` ='$transactionId'" );
$st=$st->execute();
// dd($st);
if($st) {
   
    $_SESSION['massage'] = 'Deleted';
    // $_SESSION['first_name'] = $firstName;
    // $_SESSION['last_name'] = $lastName;


    header('location: transaction.php');
    die;
    
}
$_SESSION['customer_verlidation'] = 'failed to delete';
header('location: expenses.php');
die;
echo "Customer was not deleted successfully";
}
if(isset($_GET['debtor_id'])){
$debtorId = $_GET['debtor_id'];
// $firstName = $_GET['first_name'];
// $lastName = $_GET['last_name'];

// dd(deleteCustomer($pdo, $customerId));

// $statement = deleteCustomer($pdo, $customerId);

$st = $pdo->query("DELETE from debtors WHERE `id` ='$debtorId'" );
$st=$st->execute();
// dd($st);
if($st) {
   
    $_SESSION['massage'] = 'Deleted';
    // $_SESSION['first_name'] = $firstName;
    // $_SESSION['last_name'] = $lastName;


    header('location: debtors.php');
    die;
    
}
$_SESSION['customer_verlidation'] = 'failed to delete';
header('location: debtors.php');
die;
echo "Customer was not deleted successfully";
}