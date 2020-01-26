<?php
session_start();
require("includes/dbconn.php");
$firstName = htmlspecialchars($_POST['first_name']);
$lastName = htmlspecialchars($_POST['last_name']);
$email = htmlspecialchars($_POST['email']);
$address = htmlspecialchars($_POST['address']);
$phone = htmlspecialchars($_POST['phone']);
$password = md5(htmlspecialchars($_POST['password']));
$comfirmPassword = md5(htmlspecialchars($_POST['comfirm_password']));
$status = htmlspecialchars($_POST['status']);
$adminPassword = md5(htmlspecialchars($_POST['admin_password']));

// $_SESSION['error_firstname']=$_SESSION['error_lastname']=$_SESSION['error_address']=$_SESSION['error_phone']=$_SESSION['error_password']=$_SESSION['error_comfirm_password']=$_SESSION['error_admin_password']="";

// $erroMassage="";

// if($_SERVER['REQUEST_METHOD']=="POST"){

if (empty($firstName)) {
  var_dump(empty($email));
  $_SESSION['verlidation'] = "Please First name is required";
  header('location: register.php');
  die;
};
if (empty($lastName)) {
  //  var_dump(empty($email));
  $_SESSION['verlidation'] = "Please last Name is reauired";
  header('location: register.php');
  die;
};
if (empty($phone)) {
  //  var_dump(empty($email));
  $_SESSION['verlidation'] = "Please Phone number is reauired";
  header('location: register.php');
  die;
};
if (empty($address)) {
  var_dump(empty($email));
  die;
  $_SESSION['verlidation'] = "Please address";
  header('location: register.php');
  die;
};

if (empty($email)) {
  //  var_dump(empty($email));
  $_SESSION['verlidation'] = "Please insert an Email";
  header('location: register.php');
  die;
};
$verlEmail = $pdo->query("SELECT * FROM users WHERE `email`='$email' AND `status`='$status'");

$verlEmail = $verlEmail->fetch(PDO::FETCH_ASSOC);

if ($verlEmail['email'] == $email) {
  $_SESSION['verlidation'] = "The Email Address is already taken";
  header('location: register.php');
  die;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

  $_SESSION['verlidation'] = "Please insert a valid email";
  header('location: register.php');
  die;
  # code...
};
if ($password !== $comfirmPassword) {
  $_SESSION['verlidation'] = "Your passwords do not match";
  header('location: register.php');
  die;
};

$admin = $pdo->query("SELECT * FROM users WHERE password='$adminPassword' AND status='admin'");
// var_dump($admin);
$admin = $admin->fetch(PDO::FETCH_ASSOC);

if (!$admin) {
  $_SESSION['verlidation'] = "Please insert a valid admin pass";
  header('location: register.php');
  die;
};

$users = $pdo->prepare("INSERT INTO users (`first_name`, `last_name`, `email`, `phone`,`address`,`status`, `password`, `profile`) VALUES(:first_name, :last_name, :email, :phone, :address, :status ,:password, :profile)");

//  var_dump($users);
// die;



// (INSERT INTO user (name=$name,lastname=$name))

$assignUsers = [
  'first_name' => $firstName,
  'last_name' => $lastName,
  'email' => $email,
  'phone' => $phone,
  'address' => $address,
  'status' => $status,
  'password' => $password,
  'profile' => 'unknown.jpg'
  //  'first_name'=>$firstName,
];
// var_dump($assignUsers);
// die;
$users = $users->execute($assignUsers);
// var_dump($users);
// die;
if (!$users) {
  $_SESSION['verlidation'] = "user creaton failed";
  header('location: register.php');
  die;
};
header('location: login.php');
$_SESSION['user_success'] = "User <b> $firstName $lastName </b> successfully created <br> you can now log in bellow";


      //  }
         # code...
    
        // var_dump($_POST);
     
    //  var_dump($users);
