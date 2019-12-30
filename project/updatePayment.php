<?php
session_start();
require('includes/dbconn.php');
require('includes/functions.php');

    if(isset($_GET['submit_payment'])){
       
       $amount=$_GET['amount'];
       $currency=$_GET['currency'];
       $status=$_GET['status'];
       $id=$_GET['id'];
    //    dd($_GET);
    $payDebt=$pdo->prepare("UPDATE debtors SET paid_amount=:paid, balance=:balance, status=:status WHERE id=:id AND currency_code=:currency_code");
    $debtamount=$pdo->query("SELECT owings_amount as amount,paid_amount FROM debtors WHERE `id`=' $id' AND currency_code='$currency'");
    $debtamount=$debtamount->fetch(PDO::FETCH_ASSOC);
   //  dd($debtamount);
    $paidAmount=$debtamount['paid_amount'];

    if($amount>$debtamount['amount']){
      $_SESSION['customer_verlidation']="<b>Payment</b> amount is greater than the <b>Debt</b>";
      header('location: debtors.php');
      die;
    }

    $amount=$amount +  $paidAmount;
      $balance=$debtamount['amount']-$amount;
   

   
 $debtinfo = [
    'paid' => $amount, 
    'balance' => $balance, 
    'currency_code' => $currency, 
    'status' => $status,
    'id' => $id
    
 ];
//  dd($debtamount);
 
 $payDebt=$payDebt->execute($debtinfo);
}
// dd($payDebt);
 if ($payDebt) {
     
    $_SESSION['new_customer_created']="you have successfully inserted payment";
    header('location: debtors.php');
    dd($payDebt);
 
    
    
    }
    