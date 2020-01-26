<?php
require('dbconn.php');
session_start();
require('../guard.php');


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
    $executeCustomer = $statement->execute($debtor);
    if ($executeCustomer) {
        $_SESSION['new_customer_created'] = "you have successfully added debtor";
        header('location: ../debtors.php');
    } else {
        $_SESSION['verlidaiton'] = "Debtor Entry failed";
        header('location: ../debtors.php');
    }
}
