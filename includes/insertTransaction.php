<?php
session_start();
require('functions.php');
require('dbconn.php');

$amount = htmlspecialchars($_POST['amount']);
$currency = htmlspecialchars($_POST['currency']);
$type = htmlspecialchars($_POST['type']);
$baseCurrency = htmlspecialchars($_POST['base_currency']);
$totalCurrencyAmounts = totalCurrencies($pdo);
// dd($baseCurrency);

$totalDalasis = getDalasis($pdo) - expensesAmount($pdo);


$id = ($_POST['id']);
if ($type == "buy") {
   
  if ($totalDalasis < $baseCurrency) {
    $_SESSION['massage'] = "Your Dalasis account is less than the amount";

    return header('location: ../transaction.php');

   
  }
  
  $baseCurrency = $baseCurrency * -1;

}


if ($type == "sell") {

  foreach ($totalCurrencyAmounts as $key => $currencyAmounts) {


    if ($key == ($_POST['currency'] && $currencyAmounts < $amount)) {
      // if () {

      $_SESSION['massage'] = ("Not enough foreign currency of  <b>" . $key . "</b>");
      header('location: ../customers.php');
      return;
    }
  }
  
  $amount = $amount * -1;
}

if ($type == "capital" && $currency == "GMD") {
  $baseCurrency = $amount;
  $amount = '';
}
$statement = $pdo->prepare("INSERT INTO transaction (`amount`, `currency_code`,`base_currency`, `type`, `customer_id`) VALUES ( '$amount', '$currency', '$baseCurrency',  '$type', '$id') ");


// $transaction = [
//   'amount' => $amount,
//   'currency_code' => $currency,
//   'base_currency' => $baseCurrency,
//   'type' => $type,
//   'id' => $id

// ];
// dd($statement);




$transaction = $statement->execute();
// dd($transaction);
if ($transaction) {
  $_SESSION['new_customer_created'] = "tarnsacion has been inseerted";
  if ($type) {
    # code...
    header('location: ../transaction.php');
    return;
  }
  header('location: ../customers.php');
  echo "transaction inserted";
} else {
  echo "failed";
}
