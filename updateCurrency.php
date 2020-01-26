<?php
session_start();
  require('includes/dbconn.php');
  require('includes/functions.php');
 $name=htmlspecialchars($_GET['name']);
  $buyingRate=htmlspecialchars($_GET['buying_rate']);
  $sellingRate=htmlspecialchars($_GET['selling_rate']);
  $code=htmlspecialchars($_GET['code']);
 

  // dd($_GET);

//   $updateCustomer=$pdo->("UPDATE INTO customers") VALUES()

  
$statement = $pdo->prepare("UPDATE currency SET name = :name, buying_rate = :buying_rate, selling_rate = :selling_rate WHERE code = :code" );

$updatCurrency = [
        'name' => $name, 
        'buying_rate' => $buyingRate,
        'selling_rate' => $sellingRate,
        'code' => $code
    ];
    
    // dd($updateCustomer);
    $updatCurrency=$statement->execute($updatCurrency);
     
    // dd($statement);
  if($updatCurrency){
     $_SESSION['updated_currency']="Currency $name succesfully updated";

    header('location: currency.php');

    var_dump($statement);

  }
  
    // if ($statement) {
    //   echo "success";
    // }