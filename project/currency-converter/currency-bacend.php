<?php

 
  if(isset($_POST['submit'])){

    $amount= $_POST['amount'];

    $operations = $_POST['operation'];

    $toConvert = $_POST['to_convert_to'];

   

    switch($operations){
        case "option";

               $status = "fail";

               $faileMassage = "Please select whether you want to buy or sell ";

        break;

        case"buy";

                if($_POST['amount'] >"0"){

                    $transaction = "sold";
                    
                    $status = "sucessfull";
  
                    define('CFARATE',0.085);

                    define('YENRATE',39.39);
                
                    define('GBPRATE',61.00);
                
                    define('EURORATE', 57.50);
                
                    define('USDRATE',47);
                    
                    switch ($toConvert){
                        case "";

                        $status = "fail";
                        // echo "this is bullshit";

                        $faileMassage ="Please choose a currency to convert to";
                        
                        break;
                        case "usd";

                        $result= (float)"$amount"*USDRATE;

                        $sign="Dollars";
                
                        break;
                        
                        case "euro";

                        $result= (float)"$amount"* EURORATE;

                        $sign="&euro;";

                            break;
                
                            case "cfa";

                            $result= (float)"$amount"*CFARATE;

                            $sign="Cfa";

                            break;
                
                            case "yen";
                            $result=(float) "$amount"*YENRATE;
                            $sign="¥";
                            break;
                
                            case "kron";
                            $result= (float) "$amount"*23 ;

                            $sign="(Swidish kron)";
                            break;
                
                            case "pound";
                            $result= (float)"$amount"*GBPRATE;

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


                   define('CFARATE',0.085);

                    define('YENRATE',41.39);
                
                    define('GBPRATE', 64.00);
            
                    define('EURORATE',59.50);
                
                    define('USDRATE', 48.20);

                    $status = "sucessfull";

                    $transaction = "bought";

                   
                    
                    switch ($toConvert){
                        case "";

                        $status = "fail";
                        // echo "this is bullshit";

                        $faileMassage ="Please choose a currency to convert to";
                        break;
                        case "usd";
                
                        $result="$amount"*USDRATE;

                        $sign="$";
                
                        break;
                        
                        case "euro";

                        $result=(float)"$amount"* EURORATE;

                        $sign="&euro;";

                            break;
                
                            case "cfa";

                            $result= (float)"$amount"*CFARATE;

                            $sign="Cfa";

                            break;
                
                            case "yen";
                            $result=(float) "$amount"*YENRATE;
                            $sign="¥";
                            break;
                
                            case "kron";

                            $result= (float)"$amount"*23 ;

                            $sign="(Swidish kron)";

                            break;
                
                            case "pound";

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
 

require ('currency-view.php');

// guidlance for jasseh : this is a real money converter which is built with php using switch and if statements.
