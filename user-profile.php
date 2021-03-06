<?php
    session_start();
    require_once('connect-db.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Profile</title>
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
                <li><a class="dropdown-trigger user-name-lend" href="#" data-target="dropdown-user-module"><?php echo $_SESSION['FName'][0];?><i
                            class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
    <!-- Drop Down Links -->
    <ul id="dropdown-user-module" class="dropdown-content">
        <li><a href="./user-profile.php">My Profile<i class="material-icons left">account_circle</i></a></li>
        <li class="divider"></li>
        <li><a href="./logout.php">Logout<i class="material-icons left">power_settings_new</i></a></li>
    </ul>
    <!-- Smaller Screen Menu -->
    <ul class="sidenav" id="mobile-demo">
        <li><a href="./user-dashboard.php">Dashboard<i class="fas fa-tachometer-alt left"></i></a></li>
        <li><a href="./lend.php">Lend Money<i class="fas fa-hand-holding-usd left"></i></a></li>
        <li><a href="./wallet.php">Wallet<i class="fas fa-wallet left"></i></a></li>
        <li><a href="./borrow.php">Borrow Money<i class="fas fa-exchange-alt"></i></a></li>
        <li><a href="./user-settings.php">Manage Settings<i class="fas fa-cog left"></i></a></li>
        <li><a href="./feedback.php">Feedback<i class="fas fa-comment-alt left"></i></a></li>
        <li><a href="./user-profile.php">View Profile<i class="fas fa-user-circle left"></i></a></li>
        <li><a href="./wallet.php#recent-transactions">Recent Transactions<i class="fas fa-history left"></i></a></li>
        <li><a href="./logout.php">Logout<i class="fas fa-power-off left"></i></a></li>
    </ul>
    <main style="flex: 1 0 auto">
        <div class="row" style="margin-bottom:0px;">
            <div class="col l1 hide-on-med-and-down">
                <div class="row" style="margin-bottom:0px;">
                    <div class="white col l6 center-align">
                        <ul class="side-nav-user-module" style="min-height:125vh;">
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
                <div class="row user-profile-header">
                    <div class="col s12 m12 l3">
                        <span><i class="fas fa-user-circle"></i> My Profile</span>
                    </div>
                </div>
                <div class="row" id="profile-container">
                    <div class="col s12 m12 l12">
                        <div class="row">
                            <div class="col s5w m5 l5 left-align" style="padding-top:10px;">
                                <span class="field-labels">Profile</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="divider"></div>
                        </div>
                        <div class="row">
                            <div class="col s5 m5 l5 center-align">
                                <span class="field-labels">Photo</span>
                            </div>
                            <div class="col s7 m7 l7 center-align">
                            <?php
                                $selectImage = "SELECT * FROM imageUpload WHERE User_ID ='{$_SESSION['idNo']}'";
                                $selectImageResult = $con->query($selectImage);
                                while($rowImage = $selectImageResult->fetch_array()){
                                    if($rowImage['status']==0){
                                        echo "<img src='./images/large-default-user.png' class='responsive-img' alt='User Image'>";
                                    }
                                    else{
                                        echo "<img src='./uploads/profile".$_SESSION['idNo'].".jpg?".'mt_rand'."class='responsive-img left' alt='User Image' style='max-height:200px;'>";
                                    }
                                }
                            ?>
                                <!-- <img src="./images/large-default-user.png" alt="user-image" class="left responsive-img"> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s7 offset-s5">
                                <div class="divider"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5 m5 l5 center-align">
                                <span class="field-labels">Display Name</span>
                            </div>
                            <div class="col s7 m7 l7 center-align">
                                <span class="field-values"><?php echo $_SESSION['uName'];?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s7 offset-s5">
                                <div class="divider"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5 m5 l5 center-align">
                                <span class="field-labels">Email Address</span>
                            </div>
                            <div class="input-field col s7 m7 l7 center-align">
                                <span class=" field-values"><?php echo $_SESSION['email']; ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s7 offset-s5">
                                <div class="divider"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5 m5 l5 center-align">
                                <span class="field-labels">Gender</span>
                            </div>
                            <div class="col s7 m7 l7 center-align">
                                <span class=" field-values"><?php echo $_SESSION['gender'];?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s7 offset-s5">
                                <div class="divider"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5 m5 l5 center-align">
                                <span class="field-labels">Account Type</span>
                            </div>
                            <div class="col s7 m7 l7 center-align">
                                <span class=" field-values"><?php echo $_SESSION['uType'];?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s7 offset-s5">
                                <div class="divider"></div>
                            </div>
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