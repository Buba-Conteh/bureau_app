<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <?php if($status != "fail"): ?>
    <div class="col-md-6 offset-3 mt-5">
        
        <div class="alert alert-success text-center">
            <h4>Conversion successful!</h4>
            the amount of <?=  $sign.number_format($amount,2) ?> will be <?= $transaction?> for <?= 'D'.number_format($result,2)?>
        </div>

    </div>
<?php endif; ?>

<?php if($status == "fail"): ?>

<div class="col-md-6 offset-3 mt-5">
        
        <div class="alert alert-danger text-center">
            <h4>Conversion fail !</h4>
            <?= $faileMassage ?>
        </div>

    </div>
<?php endif; ?>

</body>
</html>