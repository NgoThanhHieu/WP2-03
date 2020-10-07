  
<?php 
$amount = filter_input(INPUT_POST, 'amount');
$final = 0 ;
define('EUR_CZK', 27);
define('GBP_CZK', 30);
define('USD_CZK', 23);
$sub = filter_input(INPUT_POST, 'odeslat');
$switch =  filter_input(INPUT_POST, 'switch');
$curencyfrom;
$curencyto;
$text = " Částka " ;
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php



if (isset($sub)) {



    switch ($switch) {
    case 'czk_eur': 
        $final = $amount / EUR_CZK ;
        $curencyfrom = " CZK " ;
        $curencyto = " EUR " ;
        
    break;

    case 'eur_czk': 
        $final = $amount * EUR_CZK ;
        $curencyfrom = " EUR " ;
        $curencyto = " CZK " ;
        

    break;
        
    case 'czk_gbp': 
        $final = $amount / GBP_CZK ;
        $curencyfrom = " CZK " ;
        $curencyto = " GBP " ;
        
break;
    
    case 'gbp_czk': 
        $final = $amount * GBP_CZK ;
        $curencyfrom = " GBP " ;
        $curencyto = " CZK " ;
        
break;

    case 'czk_usd': 
        $final = $amount / USD_CZK ;
        $curencyfrom = " CZK " ;
        $curencyto = " USD " ;
        
break;
            
    default: 
        $final = $amount * USD_CZK ;
        $curencyfrom = " USD " ;
        $curencyto = " CZK " ;
        
break;
                    }
        $all =$text . $amount . $curencyfrom . " je " . $final . $curencyto ?>



<?= $all ?>
<?php
} else { ?>
    <form action="index.php" method="post">
       <input type="text" name="amount" id="amount"> <br>
       <br>
        CZK na EUR: <input type="radio" name="switch" value="czk_eur" id="switch"><br>
        EUR na CZK: <input type="radio" name="switch" value="eur_czk" id="switch"><br>
        CZK na GBP: <input type="radio" name="switch" value="czk_gbp" id="switch"><br>
        GBP na CZK: <input type="radio" name="switch" value="gbp_czk" id="switch"><br>
        CZK na USD: <input type="radio" name="switch" value="czk_usd" id="switch"><br>
        USD na CZK: <input type="radio" name="switch" value="usd_czk" id="switch"><br>
        <br>
        <input type="submit" value="odeslat" name="odeslat">
    </form>
<?php
} ?>
</body>
</html>