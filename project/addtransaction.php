<?php
session_start();
require('includes/dbconn.php');
require('includes/functions.php');
require('guard.php');
$id = $_GET['id'];


$firstName = $_GET['first_name'];
$lastName = $_GET['last_name'];
$currencies = getCurrencies($pdo);
?>

<?php require('html-header.php'); ?>

<body>

    <div id="wrapper">
        <?php require('sideBar.php'); ?>

        <!-- <div id="content-wrapper" class="d-flex flex-column"> -->

        <div class="container">

            <div class="card text-left mt-5">

                <?php

                if (isset($_SESSION['confirm_delete'])) {
                    $customerId = $_SESSION['customer_id'];
                    $firstName = $_SESSION['first_name'];
                    $lastName = $_SESSION['last_name'];
                    echo "<div class='alert alert-warning mt-2'>Do you really want to delete: $firstName<a class='btn btn-danger btn-sm mr-2' href='delete.php?id=$customerId&first_name=$firstName'>YES DELETE</a><a href='customers.php' class='btn btn-secondary btn-sm ml-2' >CANCEL</a></div>";

                    unset($_SESSION['confirm_delete']);

                    unset($_SESSION['first_name']);
                    // unset($_SESSION['last_name']);
                }

                ?>
                <div class="card-header bg-primary">
                    <div class="row">

                        <h4 class="card-title text-center col-10 text-light"> <b>Add Transaction For </b> <i> <?= $firstName ?> <?= $lastName ?></i></h4>
                        <div class="form-group">

                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="container">
                            <form action="includes/insertTransaction.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-8">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>Amount</small></label>
                                        <div class="col-sm-1-7">
                                            <input type="text" class="form-control" value="" name="amount" id="amount" placeholder="amount" required>
                                        </div>
                                    </div>


                                    <div class="col-4 form-group">
                                        <label for="currency" class="col-sm-1-7 col-form-label"><small>currency
                                            </small></label>

                                        <select class="custom-select" name="currency" id="currency">
                                            <!-- <option selected>Select one</option> -->
                                            <?php
                                            foreach ($currencies as $currency) {
                                                # code...
                                                $name = $currency['name'];
                                                $flag = $currency['flag'];
                                                $code = $currency['code'];
                                                $buyingRate = $currency['buying_rate'];
                                                $sellingRate = $currency['selling_rate'];
                                                $symbol = $currency['symbol'];

                                                echo "
                    <option value='$code' id='option' data-sell='$sellingRate' data-buy='$buyingRate'> $name($code)</option>
                    ";
                                            }


                                            ?>
                                        </select>

                                    </div>

                                    <div class="col-4 mb-5">
                                        <label for="currency" class="col-sm-1-7 col-form-label"><small>Type
                                            </small></label>

                                        <select class="custom-select" name="type" id="transType">
                                            <!-- <option selected>Select one</option> -->
                                            <option value="#">Select exchange</option>
                                            <option value="sell">Sell (to)</option>
                                            <option value="buy">Buy (from)</option>

                                            <!-- <option value="borrow">Borrow</option> -->
                                        </select>
                                    </div>


                                    <div class="col-4">



                                        <input type="hidden" class="form-control" value="<?= $id ?>" name="id" placeholder="">


                                    </div>


                                    <div class="col-8 mb-5">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>Dalasis</small></label>
                                        <div class="col-sm-1-7">
                                            <input type="number" class="form-control" value="" name="base_currency" id="base" placeholder="amount in GMD" required readonly>
                                        </div>
                                    </div>





                                    <div class="col-6">
                                        <button class="btn btn-warning form-control">Cancel</button>
                                    </div>

                                    <div class="col-6">
                                        <button class="btn btn-success form-control">Save</button>

                                    </div>


                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- </div> -->
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
<script>
    function selector(elem) {
        return document.querySelector(elem);
    }

    selector('#transType').addEventListener('input', e => {  

        let data = <?= json_encode($currencies) ?>

        console.log(data);
        for (const key in data) {
           
            if (data[key].code == selector('.custom-select').value) {

                console.log(data[key].selling_rate, data[key].buying_rate)
                if (selector('#transType').value == 'buy') {
                    selector('#base').value = data[key].selling_rate * (selector('#amount').value)
                }

                if (selector('#transType').value == 'sell') {
                    selector('#base').value = data[key].buying_rate * (selector('#amount').value)
                }
            }
            

        }


        // };
        if (selector('#transType').value == 'sell') {
            console.log((selector('#option').dataset.sell));
            selector('#base').value = (selector('#amount').value) / (selector('#option').dataset.buy);
            return;
        };

    });
</script>

</html>