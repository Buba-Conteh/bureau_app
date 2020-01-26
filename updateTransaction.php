<?php
session_start();
  require('includes/dbconn.php');
  require('includes/functions.php');
 $amount=htmlspecialchars($_GET['amount']);
  $type=htmlspecialchars($_GET['type']);
  $currency=htmlspecialchars($_GET['currency']);
  $id=htmlspecialchars($_GET['id']);
  
 

//   dd($_GET);

//   $updateCustomer=$pdo->("UPDATE INTO customers") VALUES()

  
$statement = $pdo->prepare("UPDATE transaction SET amount = :amount, currency_code = :currency_code, type = :type WHERE `id` = :id" );

$updatTransaction= [
        'amount' => $amount, 
        'currency_code' => $currency,
        'type' => $type,
        'id' => $id
    ];
    
    // dd($updatTransaction);
    $updatTransaction=$statement->execute($updatTransaction);
     
    // dd($updatTransaction);
  if($updatTransaction){
     $_SESSION['updated_currency']="Currency $name succesfully updated";

    header('location: transaction.php');

    // var_dump($statement);

  }else{
      $_SESSION['']="Fail to Update";
    header('location: transaction.php');
    die;
  }
  
    // if ($statement) {
    //   echo "success";
    // }