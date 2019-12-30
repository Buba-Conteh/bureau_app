<?php

   require('functions.php');
   $firstName=$_POST['first_name'];
   $lastName=$_POST['last_name'];
   $email=$_POST['email'];
   $address=$_POST['address'];
   $nationalId=$_POST['national_id'];
   $phone=$_POST['phone'];
   $amount=$_POST['amount'];
   $currency=$_POST['currency'];

$queryId=$pdo->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'jnior_project' AND TABLE_NAME ='customers'");
 $queryId=$queryId->fetch(PDO::FETCH_ASSOC);
 $queryId=$queryId['AUTO_INCREMENT'];
//  dd($queryId);
 

   
    $executeAmount=$transactionAmount->execute($amountData);
    // $executeCurrency=$currencyValue->execute($currencyData);

   
    // else {
    // echo"something is wrong somewhere";
// }



// $customers=$pdo->prepare("INSERT INTO cu");

// dd($queryId);

// dd($executeCustomer);
// $executeCustomer=$statement->execute($customers);
// var_dump($statement);
// dd($queryId);


//  $transactionAmount = $pdo->prepare("INSERT INTO transaction (`amount`, `currency_code`, `customer_id`) VALUES ($amount, $currency, $queryId)"); 


// dd($transactionAmount)

// $executeAmount=$transactionAmount->execute();
// dd($executeAmount);

    //  if ($transacionAmount && $statement) {
    //      # code...
    