<?php
session_start();

require('includes/dbconn.php');
require('includes/functions.php');
$codeRate=[];
$buyinRate=$pdo->query("SELECT code,buying_rate FROM currency");
$sellingRate=$pdo->query("SELECT code,selling_rate FROM currency");
if(!$buyinRate || !$sellingRate){
     echo"databas query error";
}
$buyinRate=$buyinRate->fetchALL(PDO::FETCH_ASSOC);
$sellingRate=$sellingRate->fetchALL(PDO::FETCH_ASSOC);
// dd($sellingRate);
foreach ( $buyinRate as  $buyinRate) {
    $codeRate[$buyinRate['code']] =$buyinRate['buying_rate']; 
 }

foreach ( $sellingRate as  $sellingRate) {
    // dd($sellingRate);
    $sellRate[$sellingRate['code']] =$sellingRate['selling_rate']; 
 }
//  var_dump($sellRate);



//  dd($_POST);
  if(isset($_POST['submit'])){

    $amount=htmlspecialchars($_POST['amount']);

    $operations = htmlspecialchars($_POST['operation']);

    $toConvert = htmlspecialchars($_POST['to_convert_to']);

   
    
    switch($operations){
        case "option";

               $status = "fail";

               $faileMassage = "Please select whether you want to buy or sell ";

        break;

        case"buy";

                if($_POST['amount'] >"0"){

                    $transaction = "sold";
                    
                    $status = "sucessfull";
  
                    define('CFARATE',$codeRate['CFA']);

                    define('YENRATE',$codeRate['JPY']);
                
                    define('GBPRATE',$codeRate['GBP']);
                
                    define('EURORATE',$codeRate['EUR']);
                
                    define('USDRATE',$codeRate['USD']);

                    define('UKKRATE',$codeRate['DKK']);

                    define('SEKRATE',$codeRate['SEK']);

                    
                    switch ($toConvert){
                        case "";

                        $status = "fail";
                        // echo "this is bullshit";

                        $faileMassage ="Please choose a currency to convert to";
                        
                        break;
                        case "USD";

                        $result= (float)"$amount"/USDRATE;

                        $sign="Dollars";
                
                        break;
                        
                        case "EURO";

                        $result= (float)"$amount"/ EURORATE;

                        $sign="&euro;";

                            break;
                
                            case "CFA";

                            $result= (float)"$amount"/CFARATE;

                            $sign="Cfa";

                            break;
                
                            case "YEN";
                            $result=(float) "$amount"/YENRATE;
                            $sign="¥";
                            break;
                
                            case "DKK";
                            $result= (float) "$amount"/DKKRATE ;

                            $sign="(Swidish ukk)";
                            break;
                            case "SEK";
                            $result= (float) "$amount"/SEKRATE ;

                            $sign="(Swidish SEK)";
                            break;
                
                            case "GBP";
                            $result= (float)"$amount"/GBPRATE;

                            $sign="¥";

                            break;
                
                    }
                    
                }else{

                    $faileMassage="Please an amount greater than 0 and choose a transaction";

                    $status = "fail";
                };

        break;

        case"sell";

                if($_POST['amount']>"0" ){
                        var_dump($sellingRate);

                   define('CFARATE',$sellRate['CFA']);

                    define('YENRATE',$sellRate['JPY']);
                
                    define('GBPRATE', $sellRate['GBP']);
            
                    define('EURORATE',$sellRate['EUR']);
                
                    define('USDRATE', $sellRate['USD']);
                    define('UKKRATE', $sellRate['DKK']);
                    define('SEKRATE', $sellRate['SEK']);

                    $status = "sucessfull";

                    $transaction = "bought";

                   
                    
                    switch ($toConvert){
                        case "";

                        $status = "fail";
                        // echo "this is bullshit";

                        $faileMassage ="Please choose a currency to convert to";
                        break;
                        case "USD";
                
                        $result="$amount"*\ USDRATE;

                        $sign="$";
                
                        break;
                        
                        case "EURO";

                        $result=(float)"$amount"* EURORATE;

                        $sign="&euro;";

                            break;
                
                            case "CFA";

                            $result= (float)"$amount"*CFARATE;

                            $sign="Cfa";

                            break;
                
                            case "YEN";
                            $result=(float) "$amount"*YENRATE;
                            $sign="¥";
                            break;
                
                            case "KRON";

                            $result= (float)"$amount"*23 ;

                            $sign="(Swidish kron)";

                            break;
                
                            case "GBP";

                            $result=(float)"$amount"*GBPRATE;

                            $sign="£";

                            break;
                
                    }
                
                    
                }else{
                    $faileMassage="Please ENTER an amount greater than 0";
                    $status = "fail";
                };

        break;
        default;
        $result ="please choose whether you want to buy or sell";
    }
      
  }
 
//   dd($result);3509308

if($result){
    $_SESSION['customer_verlidation']=$result;
    header('location: index.php');
    die;
}

// require ('currency-view.php');

// guidlance for jasseh : this is a real money converter which is built with php using switch and if statements.
