<?php
session_start();
require('includes/functions.php');
require('html-header.php');
// dd(totalCustomer($pdo));
$totalCustomer = totalCustomer($pdo);
// dd($totalCustomer);
$totalDebtors = totalDebtors($pdo);
$totalExpenses = totalDebtors($pdo);
$newAmounts = totalCurrencies($pdo);
$currencies = getCurrencies($pdo);
$expensesAmount = expensesAmount($pdo);
$totalDalasis = getDalasis($pdo);
$newBalance = totalDebtorCurrencies($pdo);
// dd($totalDalasis);
$totalDalasis = $totalDalasis - $expensesAmount;
// var_dump($newAmounts);
// dd($_SESSION['admin']);
?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- ...............................sude bar...... -->
        <?php require('sideBar.php'); ?>
        <!-- .................................. end of side bar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <?php require('header.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" id="form" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-money-bill-wave"></i> Money Exchange</a>
                    </div>
                    <?php require('alert.php');  ?>
                    <!-- Content Row -->
                    <!-- transaction form box............... -->
                    <div class="card col-10 offset-1 o-hidden border-0 shadow-lg my-5" id="dropdownCard" style="display:none">

                        <button type="button" class="close" aria-label="Close" id="closeDropdown">
                            <span aria-hidden="true" data-dismiss="card">&times;</span>
                        </button>

                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Corrency converter</h1>
                                        </div>

                                        <form class="form-horizontal" method="POST" action="currencyConverter.php">
                                            <div class="form-group row">
                                                <label for="currency" class="col-sm-4 col-form-label">Convert From</label>
                                                <div class="col-sm-8">
                                                    <select name="to_convert_to" id="currency" class="form-control rounded-0">
                                                        <option value="">Currency To Convert From</option>
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
                    <option value='$code'> <img src='$flag' width='40' height='25' alt='flag'> $name($code)</option>
                    ";
                                                        }


                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <label for="buy_or_sell" class="col-sm-4 col-form-label">Operation</label>
                                                <div class="col-sm-8">
                                                    <select name="operation" id="buy_or_sell" class="form-control rounded-0">
                                                        <option value="option">Select Option</option>
                                                        <option value="buy" name="buy">Buy from customer</option>
                                                        <option value="sell">Sell from customer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="customer" class="col-sm-4 col-form-label">Amount To Convert</label>
                                                <div class="input-group col-sm-8">
                                                    <input type="text" class="form-control rounded-0" id="amount" name="amount" placeholder="5000">
                                                </div>
                                            </div>

                                            <div class="d-flex">
                                                <button type="reset" class="btn btn-outline-success mb-2 text-black rounded-0 w-50 
                   -2">Reset Fields</button>
                                                <button type="submit" name="submit" value="submit" class="btn btn-outline-primary mb-2 text-black rounded-0 w-50">Convert Currency</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of transaction box... -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-3 mb-3">
                            <div class="card border-left-success shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <i class="fas fa-3x text-gray-300">D</i>
                                        </div>
                                        <div class="col mr-2 ml-1">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total
                                                Earnings</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($totalDalasis) ?> </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-3 mb-3">
                            <div class="card border-left-success shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">

                                        <div class="col-auto">
                                            <i class="fas fa-3x text-gray-300">cfa</i>
                                        </div>
                                        <div class="col mr-1 ml-1">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                (Total Earnings)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($newAmounts['CFA'] ?? 0) ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-3 mb-3">
                            <div class="card border-left-success shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($newAmounts['GBP'] ?? 0) ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pound-sign fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-3 mb-3">
                            <div class="card border-left-success shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-3x text-gray-300"> </i>
                                        </div>
                                        <div class="col mr-2 ml-1">

                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($newAmounts['USD'] ?? 0) ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-3 mb-3">
                            <div class="card border-left-success shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <i class="fas fa-euro-sign fa-3x text-gray-300"></i>
                                        </div>

                                        <div class="col ml-2">

                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= number_format($newAmounts['EUR'] ?? 0) ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-3 mb-3">
                            <div class="card border-left-success shadow h-80 py-2">
                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto mr-2">
                                            <i class="fas fa-yen-sign fa-3x text-gray-300"></i>
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($newAmounts['YEN'] ?? 0) ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-3">
                            <div class="card border-left-success shadow h-80 py-2">
                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto mr-2">
                                            <i class="fas fa-1x text-gray-300 mr-2">DKK</i>
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($newAmounts['DKK'] ?? 0) ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-3 mb-3">
                            <div class="card border-left-success shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <i class="fas fa-3x text-gray-300 mr-3">
                                                <h2>Kr</h2>
                                            </i>
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($newAmounts['SEK'] ?? 0) ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>

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

            <?php require('footer.php'); ?>