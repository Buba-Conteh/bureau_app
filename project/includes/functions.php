<?php
require('dbconn.php');
function dd($dd)
{
   var_dump($dd);
   die();
}
function pagination($end,$pdo,$table){

$currentPage=isset($_GET['start'])?$_GET['start']:1;

$start=($currentPage-1)*$end;
// require_once('pdo.php');

// $lastPafination=$pagination-1;
$result=$pdo->query("SELECT * FROM $table LIMIT $start,$end");

$result=$result->fetchAll(PDO::FETCH_ASSOC);

return $result;
}
function pagRows($table,$pdo,$end){
   
$rows=$pdo->query("SELECT * FROM $table");
$rows=$rows->fetchAll(PDO::FETCH_ASSOC);
$pagination=count($rows)/$end;
return $pagination;
}
function getCustomers($pdo,$set)
{
  $customers=pagination($set,$pdo,'customers');
   // $customers = $pdo->query("SELECT * FROM customers ORDER BY updated_time DESC");

   // $customers = $customers->fetchAll(PDO::FETCH_ASSOC);

   return $customers;
}
function createCustomer($pdo)
{
   $firstName = $_POST['first_name'];
   $lastName = $_POST['last_name'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $nationalId = $_POST['national_id'];
   $phone = $_POST['phone'];
   $userId = $_SESSION['user_id'];


   $statement = $pdo->prepare("INSERT INTO customers (`first_name`, `last_name`, `phone`, `email`, `address`, `national_id`,`user_id`) VALUES (:first_name, :last_name, :phone, :email, :address, :national_id, :active_user_id)");

   $customers = [
      'first_name' => $firstName,
      'last_name' => $lastName,
      'phone' => $phone,
      'email' => $email,
      'address' => $address,
      'national_id' => $nationalId,
      'active_user_id' => $userId
   ];

   // dd($customers);
   $executeCustomer = $statement->execute($customers);
   // dd($executeCustomer);
   return $executeCustomer;
}
function createDebtor($pdo)
{
   if (isset($_GET['submit'])) {
      $firstName = htmlspecialchars($_GET['first_name']);
      $lastName = htmlspecialchars($_GET['last_name']);
      $email = htmlspecialchars($_GET['email']);
      $address = htmlspecialchars($_GET['address']);
      $nationalId = htmlspecialchars($_GET['national_id']);
      $phone = htmlspecialchars($_GET['phone']);
      $amount = htmlspecialchars($_GET['amount']);
      $currency = htmlspecialchars($_GET['currency']);


      $statement = $pdo->prepare("INSERT INTO debtors (`first_name`, `last_name`, `phone`, `email`, `address`, `id_number`,`owings_amount`,`currency_code`) VALUES (:first_name, :last_name, :phone, :email, :address, :national_id,:owings_amount,:currency)");

      $debtor = [
         'first_name' => $firstName,
         'last_name' => $lastName,
         'phone' => $phone,
         'email' => $email,
         'address' => $address,
         'national_id' => $nationalId,
         'owings_amount' => $amount,
         'currency' => $currency

      ];
      // dd($debtor);
      $executeCustomer = $statement->execute($debtor);
      //   dd($executeCustomer);
      if ($executeCustomer) {
         $_SESSION['new_customer_created'] = "you have successfully added debtor";
         // return $executeCustomer;
      } else {
         $_SESSION['verlidaiton'] = "Debtor Entry failed";
      }
   }
}


function insertExpenses($pdo)
{
   $subject = $_POST['subject'];
   $amount = $_POST['amount'];
   $details = $_POST['details'];



   $expenses = $pdo->prepare("INSERT INTO expenses (`subject`, `expense_amount`, `expense_detail`) VALUES (:subject, :amount, :details)");

   $expense = [
      'subject' => $subject,
      'amount' => $amount,
      'details' => $details

   ];
   $expenses = $expenses->execute($expense);
   $_SESSION['updated_currency'] = "Expenses has be successfully added";
   return $expenses;
}
function totalCustomer($pdo)
{
   $customers = $pdo->query("SELECT * FROM customers");
   $customers = $customers->fetchAll(PDO::FETCH_ASSOC);

   return count($customers);
}

function totalTransaction($pdo)
{
   $transaction = $pdo->query("SELECT * FROM transaction");
   $transaction = $transaction->fetchAll(PDO::FETCH_ASSOC);

   return count($transaction);
}
function totalDebtors($pdo)
{
   $debtors = $pdo->query("SELECT * FROM debtors");
   $debtors = $debtors->fetchAll(PDO::FETCH_ASSOC);
   return count($debtors);
}
function totalDebtorCurrencies($pdo)
{
   $debtorsCurncy = $pdo->query("SELECT sum(balance) as balance, currency_code FROM `debtors` GROUP BY currency_code");
   $debtorsCurncy = $debtorsCurncy->fetchAll(PDO::FETCH_ASSOC);

   $newBalance = [];
   foreach ($debtorsCurncy as $value) {
      // dd($value);
      $newBalance[] = $value;
   }
   // dd($newBalance);
   return $newBalance;
}
function totalExpenses($pdo)
{
   $expenses = $pdo->query("SELECT * FROM expenses");
   $expenses = $expenses->fetchAll(PDO::FETCH_ASSOC);
   return count($expenses);
}
function expensesAmount($pdo)
{
   $expenses = $pdo->query("SELECT sum(expense_amount) as total FROM `expenses`");
   $expensesAmount = $expenses->fetchAll(PDO::FETCH_ASSOC);
   $expensesAmount = $expensesAmount[0]['total'];

   return $expensesAmount;
}


function getCustomer($pdo, $id)
{


   $customers = $pdo->query("SELECT * FROM customers WHERE `id`='$id'");

   $customer = $customers->fetch(PDO::FETCH_ASSOC);


   return $customer;
}

function getCustomerTransaction($pdo, $id)
{

   $customer = $pdo->query("SELECT currency.flag,transaction.customer_id,transaction.currency_code,SUM(transaction.amount) as amount FROM transaction LEFT JOIN (currency) ON(transaction.currency_code=currency.code) WHERE customer_id = '$id' GROUP BY customer_id,currency_code
   ");

   $customer = $customer->fetchAll(PDO::FETCH_ASSOC);

   return  $customer;
}
function getDebtor($pdo, $id)
{


   $customers = $pdo->query("SELECT * FROM debtors LEFT JOIN (currency, transaction) ON (debtors.id = transaction.debtors_id AND transaction.currency_code=currency.code) WHERE debtors.id=$id");

   $customers = $customers->fetch(PDO::FETCH_ASSOC);
   return $customers;
}
function viewDebtor($pdo, $id)
{


   $debtor = $pdo->query("SELECT * FROM debtors WHERE debtors.id=$id");

   $debtor = $debtor->fetch(PDO::FETCH_ASSOC);
   return $debtor;
}
function viewUser($pdo, $id)
{


   $debtor = $pdo->query("SELECT * FROM users WHERE users.id=$id");

   $debtor = $debtor->fetch(PDO::FETCH_ASSOC);
   return $debtor;
}
//  .............................

function getUsers($pdo)
{

   $users = $pdo->query("SELECT * FROM users");

   $users = $users->fetchAll(PDO::FETCH_ASSOC);
   // var_dump($users);
   return $users;
}


function getDebtors($pdo)
{

   $users = $pdo->query("SELECT * FROM debtors");

   $debtors = $users->fetchAll(PDO::FETCH_ASSOC);
   return $debtors;
}
function getTransactions($pdo)
{

   $transactions = $pdo->query("SELECT * FROM transaction");

   $transactions = $transactions->fetchAll(PDO::FETCH_ASSOC);
   return $transactions;
}
function getTransaction($pdo, $id)
{

   $transaction = $pdo->query("SELECT * FROM transaction WHERE `id`=$id");

   $transaction = $transaction->fetch(PDO::FETCH_ASSOC);
   return $transaction;
}
function viewTransaction($pdo, $id)
{

   $transaction = $pdo->query("SELECT first_name,last_name,phone,transaction_date FROM transaction LEFT JOIN users ON transaction.user_id=users.id WHERE transaction.id='$id'");

   $transaction = $transaction->fetchAll(PDO::FETCH_ASSOC);
   return $transaction;
}


function getCurrencies($pdo)
{

   $users = $pdo->query("SELECT * FROM currency ORDER BY `updated_time` DESC");

   $currencies = $users->fetchAll(PDO::FETCH_ASSOC);
   return $currencies;
}
function getDalasis($pdo)
{

   $base = $pdo->query("SELECT sum(base_currency) as dalasis FROM transaction");


   $baseCurrency = $base->fetch(PDO::FETCH_ASSOC);
   $baseCurrency = $baseCurrency['dalasis'];
   return $baseCurrency;
}

function getCurrency($pdo, $code)
{

   $currency = $pdo->query("SELECT * FROM currency WHERE `code`='$code'");

   $currency = $currency->fetch(PDO::FETCH_ASSOC);
   // dd($currency);
   return $currency;
}
// function updateCurrency($pdo, $code)
// {

//    $currency = $pdo->query("UPDATE currency SET `buyiny_rate`='$buyingRate', `selling_rate`='$sellingRate'");

//    $currency = $currency->fetchAll(PDO::FETCH_ASSOC);
//    return $currency;
// }


function getExpenses($pdo)
{

   $users = $pdo->query("SELECT * FROM expenses");

   $expenses = $users->fetchAll(PDO::FETCH_ASSOC);
   return $expenses;
}
function getExpense($pdo, $id)
{

   $users = $pdo->query("SELECT * FROM expenses WHERE `id`='$id'");

   $expense = $users->fetch(PDO::FETCH_ASSOC);
   return $expense;
}



function totalCurrencies($pdo)
{

   $amount = $pdo->query("SELECT SUM(`Amount`) AS `Total`, `currency_code` FROM `transaction` GROUP BY `Currency_code`
");

   $amount = $amount->fetchAll(PDO::FETCH_ASSOC);
   // dd($amount);


   $newAmounts = [];
   foreach ($amount as $value) {
      $newAmounts[$value['currency_code']] = $value['Total'];
   }

   return $newAmounts;
}

function shearch($pdo, $queryString)
{

   $customers = $pdo->query("SELECT * FROM customers WHERE `first_name`LIKE '%$queryString%'");

   $customers = $customers->fetchAll(PDO::FETCH_ASSOC);
   return $customers;
}
