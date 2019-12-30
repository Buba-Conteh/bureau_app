<?php
session_start();
if(isset($_GET['update_user'])){
  require('includes/dbconn.php');
  require('includes/functions.php');
  $firstName=htmlspecialchars($_GET['first_name']);
  $lastName=htmlspecialchars($_GET['last_name']);
  $phone=htmlspecialchars($_GET['phone']);
  $address=htmlspecialchars($_GET['address']);
  $email=htmlspecialchars($_GET['email']);
  $password=md5(htmlspecialchars($_GET['password']));
  $userId=htmlspecialchars($_GET['id']);

  

//   $updateuser=$pdo->("UPDATE INTO users") VALUES()

  
$statement = $pdo->prepare("UPDATE users SET first_name = :first_name,  last_name = :last_name, phone = :phone, address = :address, email = :email, password=:password WHERE id = :user_id" );

$updateUser = [
        'first_name' => $firstName, 
        'last_name' => $lastName, 
        'user_id' => $userId,
        'phone' => $phone,
        'address' => $address,
          'password'=>$password,
        'email' => $email
    ];
    
    // dd($updateuser);
    $statement=$statement->execute($updateUser);
      
    if($statement){
    // dd($statement);
    
    $_SESSION['new_customer_created']="You have successfull updated User $firstName $lastName";
    header('location: users.php');
    
    }else{
      // dd($userId);
      $_SESSION['customer_verlidation']="user was update failed";
      $_SESSION['id']=$userId;
      header('location: editUser.php');
      die;
    }
  

    var_dump($statement);
}


if(isset($_GET['update_expense'])){
  require('includes/dbconn.php');
  require('includes/functions.php');
  $subject=htmlspecialchars($_GET['subject']);
  $amount=htmlspecialchars($_GET['amount']);
  $details=htmlspecialchars($_GET['details']);
  $id=htmlspecialchars($_GET['id']);
  
  
  // dd($_GET);
$statement = $pdo->prepare("UPDATE expenses SET subject = :subject,  expense_amount = :amount, expense_detail = :details WHERE id = :id" );

$updateExpense = [
        'subject' => $subject, 
        'amount' => $amount, 
        'details' => $details, 
        'id'=> $id
        
    ];
    
    // dd($updateExpense);
    $statement=$statement->execute($updateExpense);
      // dd($statement);
    if($statement){
    // dd($statement);
    
    $_SESSION['new_customer_created']="You have successfull updated Expense ";
    header('location: expenses.php');
    
    }else{
      // dd($userId);
      $_SESSION['customer_verlidation']="user was update failed";
      $_SESSION['id']=$userId;
      header('location: expenses.php');
      die;
    }
  

    var_dump($statement);
}


//##################### this one below if for the customers################################
  require('includes/dbconn.php');
  require('includes/functions.php');
  $firstName=$_GET['first_name'];
  $middleName=$_GET['middle_name'];
  $lastName=$_GET['last_name'];
  $phone=$_GET['phone'];
  $address=$_GET['address'];
  $nationalID=$_GET['national_id'];
  $customerId=$_GET['id'];

  // dd($_GET);

//   $updateCustomer=$pdo->("UPDATE INTO customers") VALUES()

  
$statement = $pdo->prepare("UPDATE customers SET first_name = :first_name, middle_name = :middle_name, last_name = :last_name, phone = :phone, address = :address, national_id = :national_id WHERE id = :customer_id" );

$updateCustomer = [
        'first_name' => $firstName, 
        'middle_name' => $middleName,
        'last_name' => $lastName, 
        'customer_id' => $customerId,
        'phone' => $phone,
        'address' => $address,
        'national_id' => $nationalID
    ];
    
    // dd($updateCustomer);
    $statement=$statement->execute($updateCustomer);
     
    // dd($statement);

    header('location: customers.php');

    var_dump($statement);
    // if ($statement) {
    //   echo "success";
    // }