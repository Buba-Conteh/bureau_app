<?php

// // API Endpoint, access key, required parameters


// if(isset($_GET['submit'])){
    $converFrom=htmlspecialchars($_GET['currencyFrom']);
    $converTo=htmlspecialchars($_GET['currencyTo']);
    $amount=htmlspecialchars($_GET['amount']);

    var_dump($converFrom);

    $endpoint = 'convert';
$access_key = '82be4c60e6292839d31ace7dceca1231';

$from = $converFrom;
$to = $converTo;
$amount = 60;

// initialize CURL:
$ch = curl_init('https://api.exchangeratesapi.io/latest'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// get the JSON data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$conversionResult = json_decode($json, true);

var_dump($conversionResult);
// access the conversion result
echo $conversionResult['result'];
// }



// $endpoint = 'latest';
// $access_key = '82be4c60e6292839d31ace7dceca1231';

// // Initialize CURL:
// $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// // Store the data:
// $json = curl_exec($ch);
// curl_close($ch);

// // Decode JSON response:
// $exchangeRates = json_decode($json, true);

// // Access the exchange rate values, e.g. GBP:
// echo $exchangeRates['rates']['GMD']; 