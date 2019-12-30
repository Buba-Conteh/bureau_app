<?php

if(isset($_SESSION['customer_id_delete'])){
    $customerId = $_SESSION['customer_id'];
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    echo "<div class='alert alert-warning mt-2'>Do you really want to delete: <b>$firstName $lastName </b><a class='btn btn-danger btn-sm mr-2' href='delete.php?customer_id_delete=$customerId&first_name=$firstName&last_name=$lastName'>YES DELETE</a><a href='customers.php' class='btn btn-secondary btn-sm ml-2' >CANCEL</a></div>";
    
    unset($_SESSION['customer_id_delete']);
    
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
};
if(isset($_SESSION['user_id_delete'])){
    $userId = $_SESSION['user_id'];
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    echo "<div class='alert alert-warning mt-2'>Do you really want to delete: <b>$firstName $lastName </b><a class='btn btn-danger btn-sm mr-2' href='delete.php?user_id_delete=$userId&first_name=$firstName&last_name=$lastName'>YES DELETE</a><a href='customers.php' class='btn btn-secondary btn-sm ml-2' >CANCEL</a></div>";
    
    unset($_SESSION['user_id_delete']);
    
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
};
if(isset($_SESSION['debtor_id'])){
    $debtorId = $_SESSION['debtor_id'];
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    echo "<div class='alert alert-warning mt-2'>Do you really want to delete: <b>$firstName $lastName </b><a class='btn btn-danger btn-sm mr-2' href='delete.php?debtor_id=$debtorId&first_name=$firstName'>YES DELETE</a><a href='debtors.php' class='btn btn-secondary btn-sm ml-2' >CANCEL</a></div>";
    
    unset($_SESSION['debtor_id']);
    
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
};
if(isset($_SESSION['delete'])){
    $expenseId = $_SESSION['expense_id'];
//     $firstName = $_SESSION['first_name'];
//     $lastName = $_SESSION['last_name'];
    echo "<div class='alert alert-warning mt-2'>Do you really want to delete: <b>This Expense </b><a class='btn btn-danger btn-sm mr-2' href='delete.php?expense_id=$expenseId'>YES DELETE</a><a href='customers.php' class='btn btn-secondary btn-sm ml-2' >CANCEL</a></div>";
    
    unset($_SESSION['delete']);
    

};
if(isset($_SESSION['confirm_delete_transaction'])){
    $transactionId = $_SESSION['transaction_id'];
    
    echo "<div class='alert alert-warning mt-2'>Do you really want to delete: <b></b><a class='btn btn-danger btn-sm mr-2' href='delete.php?transaction_id=$transactionId'>YES DELETE</a><a href='customers.php' class='btn btn-secondary btn-sm ml-2' >CANCEL</a></div>";
    
    unset($_SESSION['confirm_delete_transaction']);
    
    
};
if(isset($_SESSION['new_customer_created'])){
     $massage=$_SESSION['new_customer_created'];
   
    echo "<div class='alert alert-success mt-2'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
            </button>
    $massage
          </div>";
    
  unset($_SESSION['new_customer_created']);

    
  
}
if(isset($_SESSION['customer_verlidation'])){
     $massage=$_SESSION['customer_verlidation'];
   
    echo "<div class='alert alert-danger mt-2'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
            </button>
    $massage
          </div>";
    
  unset($_SESSION['customer_verlidation']);

    
  
};
if(isset($_SESSION['massage'])){
     $massage=$_SESSION['massage'];
   
    echo "<div class='alert alert-danger mt-2'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
            </button>
    $massage
          </div>";
    
  unset($_SESSION['massage']);

    
  
}
if(isset($_SESSION['user_success'])){
     $massage=$_SESSION['user_success'];
   
    echo "<div class='alert alert-success mt-2 text-center'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
            </button>
    $massage
          </div>";
    
  unset($_SESSION['user_success']);

    
  
}

   // ............... update currency seucessfully

if(isset( $_SESSION['updated_currency'])){
     $massage= $_SESSION['updated_currency'];
   
    echo "<div class='alert alert-success mt-2 text-center'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
            </button>
    $massage  
          </div>";
    
  unset( $_SESSION['updated_currency']);

    
  
}


