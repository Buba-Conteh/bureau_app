<?php
// session_start();
// require('dbconn.php');
// require('functions.php');
// // require('includes/functions.php');
// if(empty($firstName)){
//     var_dump(empty($email));
//   $_SESSION['verlidation']="Please First name is required";
//    header('location: register.php');
//    die;
//   };
//   // $customers=$pdo->query("SELECT * FROM customers WHERE `id`='$id'");
   
//    $customer=$customers->fetch(PDO::FETCH_ASSOC);
//   if(empty($lastName)){
//    //  var_dump(empty($email));
//   $_SESSION['verlidation']="Please last Name is reauired";
//    header('location: register.php');
//    die;
//   };
//   if(empty($phone)){
//    //  var_dump(empty($email));
//   $_SESSION['verlidation']="Please Phone number is reauired";
//    header('location: register.php');
//    die;
//   };
//   if(empty($address)){
//    //  var_dump(empty($email));
//   $_SESSION['verlidation']="Please address";
//    header('location: register.php');
//    die;
//   };
//   if(empty($email)){
//    //  var_dump(empty($email));
//   $_SESSION['verlidation']="Please insert an Email";
//    header('location: register.php');
//    die;
//   };
//   if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

//    $_SESSION['verlidation']="Please insert a valid email";
//    header('location: register.php');
//    die;
//     # code...
//   };
//   if ($password !== $comfirmPassword) {
//    $_SESSION['verlidation']="Your passwords do not match";
//    header('location: register.php');
//    die;

//   };
// $createCustomer=createCustomer($pdo);
// // dd($firstName);

// if ($createCustomer) {
//     $_SESSION['new_customer_created']="You have successfully created a new customer";
//     // $_SESSION['first_name']=$firstName;
//     // $_SESSION['last_name']=$lastName;
//     header('location: ../customers.php');
// }else{
//     echo"not executed";
// }