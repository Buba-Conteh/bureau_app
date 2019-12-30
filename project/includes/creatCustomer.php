<?php
session_start();
require('dbconn.php');
require('functions.php');
// require('includes/functions.php');
// dd($firstName);
// dd($_POST);
function backToBase(){
  header('location: ../customers.php');
   die;
}
if(empty($_POST['first_name'])){
    // var_dump(empty($email));
  $_SESSION['customer_verlidation']="Please First name is required";
  backToBase();
   
  };
  if(empty($_POST['last_name'])){
   //  var_dump(empty($email));
  $_SESSION['customer_verlidation']="Please last Name is reauired";
  backToBase();
  };
  if(empty($_POST['phone'])){
   //  var_dump(empty($email));
  $_SESSION['customer_verlidation']="Please Phone number is reauired";
  backToBase();
  };
  if(empty($_POST['address'])){
   //  var_dump(empty($email));
  $_SESSION['customer_verlidation']="Please address number is reauired";
  backToBase();
  };
  if(empty($_POST['national_id'])){
   //  var_dump(empty($email));
  $_SESSION['customer_verlidation']="Please national ID number is reauired";
  backToBase();
  };
  // if(empty($address)){
  //  //  var_dump(empty($email));
  // $_SESSION['customer_verlidation']="Please address";
  //  header('location: ../customers.php');
  //  die;
  // };
  if(empty($_POST['email'])){
   //  var_dump(empty($email));
  $_SESSION['customer_verlidation']="Please insert an Email";
  backToBase();
  };
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

   $_SESSION['customer_verlidation']="Please insert a valid email";
   backToBase();
    # code...
  };
  // if ($password !== $comfirmPassword) {
  //  $_SESSION['customer_verlidation']="Your passwords do not match";
  //  header('location: ../customers.php');
  //  die;

  // };
  
$createCustomer=createCustomer($pdo);
// dd($createCustomer);

if ($createCustomer) {
    $_SESSION['new_customer_created']="You have successfully created a new customer";
    // $_SESSION['first_name']=$firstName;
    // $_SESSION['last_name']=$lastName;
    header('location: ../customers.php');
}else{
    echo"not executed";
}