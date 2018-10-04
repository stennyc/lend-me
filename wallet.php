<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Wallet</title>
    <link rel="icon" type="image/png" href="./images/blue-coin.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/user-module.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>

<body style="display:flex; min-height: 100vh; flex-direction: column;">
    <nav>
        <div class="nav-wrapper" style="background-color:white;">
            <div style="margin-top: 5px; margin-left:12px;" class="img-hold">
                <a href="user-dashboard.php" class="brand-logo"><img src="./images/p2p-green-logo-resized.png"></a>
            </div>
            <!--Menu Trigger on Small Screen-->
            <a href="#" data-target="mobile-demo" id="mobile-menu-icon" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li id="settings-link"><a href="./user-settings.php"><i class="material-icons">settings</i></a></li>
                <li><a class="dropdown-trigger user-name-lend" href="#" data-target="dropdown-user-module"><?echo $_SESSION['FName'][0]?><i
                            class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
    <!-- Drop Down Links -->
    <ul id="dropdown-user-module" class="dropdown-content">
        <li><a href="./user-profile.php">My Profile<i class="material-icons left">account_circle</i></a></li>
        <li class="divider"></li>
        <li><a href="#!">Logout<i class="material-icons left">power_settings_new</i></a></li>
    </ul>
    <!-- Smaller Screen Menu -->
    <ul class="sidenav" id="mobile-demo">
        <li><a href="./user-dashboard.php">Dashboard<i class="fas fa-tachometer-alt left"></i></a></li>
        <li><a href="./lend.php">Lend Money<i class="fas fa-hand-holding-usd left"></i></a></li>
        <li><a href="./wallet.php">Wallet<i class="fas fa-wallet left"></i></a></li>
        <li><a href="./borrow.php">Borrow Money<i class="fas fa-exchange-alt"></i></a></li>
        <li><a href="./feedback.php">Feedback<i class="fas fa-comment-alt left"></i></a></li>        
        <li><a href="./user-settings.php">Manage Settings<i class="fas fa-cog left"></i></a></li>
        <li><a href="./user-profile.php">View Profile<i class="fas fa-user-circle left"></i></a></li>
        <li><a href="./wallet.php#recent-transactions">Recent Transactions<i class="fas fa-history left"></i></a></li>
        <li><a href="#">Logout<i class="fas fa-power-off left"></i></a></li>
    </ul>
    <main style="flex:1 0 auto;">
        <div class="row" style="margin-bottom:0px;">
            <div class="col l1 hide-on-med-and-down">
                <div class="row" style="margin-bottom:0px;">
                    <div class="white col l6 center-align">
                        <ul class="side-nav-user-module">
                            <li><a href="./user-dashboard.php" title="Dashboard"><i class="fas fa-tachometer-alt"></i></a></li>
                            <li><a href="./lend.php" title="Lend Money"><i class="fas fa-hand-holding-usd"></i></a></li>
                            <li><a href="./wallet.php" title="Wallet"><i class="fas fa-wallet"></i></a></li>
                            <li><a href="./borrow.php" title="Borrow Money"><i class="fas fa-exchange-alt"></i></a></li>
                            <li><a href="./user-settings.php" title="Manage Settings"><i class="fas fa-cog"></i></a></li>
                            <li><a href="./feedback.php" title="Feedback"><i class="fas fa-comment-alt"></i></a></li>                                                        
                            <li><a href="./wallet.php#recent-transactions" title="Transaction History"><i class="fas fa-history"></i></a></li>
                            <li><a href="./user-profile.php" title="View Profile"><i class="fas fa-user-circle"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l11">
                <div class="row">
                    <div class="col s12 m12 l3" id="wallet-header-container">
                        <span><i class="fas fa-wallet"></i> My Wallet</span>
                    </div>
                </div>
                <div class="row" id="account-balance-row">
                    <div class="col s12 m12 l12">
                        <div class="row">
                            <div class="col s12 m12 l12 center-align" id="acc-balance-header-container">
                                <span>Wallet Balance</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 center-align" id="acc-balance-value-container">
                                <span>Ksh. 30000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8" id="wallet-btn-container">
                        <a href="#modal-deposit" onclick="$('#modal-deposit').modal('open');" class="btn-large waves-effect waves-light"
                            id="wallet-deposit-btn">Deposit</a>
                        <a href="#modal-withdraw" class="btn-large waves-effect waves-light" onclick="$('#modal-withdraw').modal('open');" id="wallet-withdraw-btn">Withdraw</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l3 transaction-history-header-container">
                        <span><i class="fas fa-history"></i> Transaction History</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 thistory-description-container">
                        <span>View all your recent transactions and account for your transactions</span>
                    </div>
                </div>
                <!-- Deposit Modal -->
                <div class="modal" id="modal-deposit">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col s8 m8 l8">
                                <span class="deposit-header"><i class="fas fa-piggy-bank"></i> Deposit Money</span>
                            </div>
                            <div class="col s4 m4 l4">
                                <a href="#!" class="modal-close waves-effect waves-green right"><i class="material-icons center">close</i></a>
                            </div>
                        </div>
                        <form action="">
                            <div class="row deposit-form-container">
                                <div class=" input-field col s12 m12 l12">
                                    <i class="material-icons prefix">attach_money</i>
                                    <input type="number" id="deposit-icon">
                                    <label for="deposit-icon">Amount to Deposit</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12 center-align">
                                    <button class="btn waves-effect waves-light type
                                    submit"
                                        name="deposit-money-btn">
                                        Deposit<i class="material-icons">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Withdraw Modal -->
                <div class="modal" id="modal-withdraw">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col s8 m8 l8" id="withdraw-container">
                                <span class="withdraw-modal-header">Withdraw Money</span>
                            </div>
                            <div class="col s4 m4 l4">
                                <a href="#!" class="modal-close waves-effect waves-green right"><i class="material-icons center">close</i></a>
                            </div>
                        </div>
                        <form action="">
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    <i class="material-icons prefix">attach_money</i>
                                    <input type="number" id="withdraw-icon">
                                    <label for="withdraw-icon">Amount to Withdraw</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12 center-align">
                                    <button class="btn waves-effect waves-light" type="submit" name="withdraw-money-btn">
                                        Withdraw <i class="material-icons">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="transaction-table-container" id="recent-transactions">
                            <table class="responsive-table">
                                <thead>
                                    <th style="width:200px;">Transaction ID</th>
                                    <th>Time Stamp</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>T1000</td>
                                        <td>02/11/2019 12:42pm</td>
                                        <td>Ksh. 1000</td>
                                        <td>Loan Repayment</td>
                                    </tr>
                                    <tr>
                                        <td>T1000</td>
                                        <td>02/11/2019 12:42pm</td>
                                        <td>Ksh. 1000</td>
                                        <td>Loan Funding</td>
                                    </tr>
                                    <tr>
                                        <td>T1000</td>
                                        <td>02/11/2019 12:42pm</td>
                                        <td>Ksh. 1000</td>
                                        <td>Loan Funding</td>
                                    </tr>
                                    <tr>
                                        <td>T1000</td>
                                        <td>02/11/2019 12:42pm</td>
                                        <td>Ksh. 1000</td>
                                        <td>Loan Funding</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <footer style="background-color: #323232;" class="page-footer" style="text-align:center; padding: 10px; margin-top:0;">
        <!-- <div class="center-align container" id="foot-logo">
                            <img src="./images/p2p-blue-new-layout.png" alt="company-logo">
                        </div> -->
        <div class=" center-align container">
            © 2018 StrathFund
        </div>
    </footer>
</body>

</html>