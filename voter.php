<?php
session_start();
require_once('header.html');
?>

<div class="row">
    <div class="col-md-12 col-lg-12 bg-dark text-light">
        <h3 style="text-align: center;font-weight: bold;">Online Voting System</h3>
    </div>
</div>

<div class="row" style="margin-top: 10px;">
    <div class="col-lg-4 col-md-4"></div>
    <div class="col-lg-4 col-md-4 mx-auto loginBox">
    <h2 style="text-align: center;">Voters Login Form</h2>
    <form method="post">
        <input type="text" name="adhaarnumber" id="adhaarnumber" placeholder="Enter Adhaar Number" required class="form-control" /><br>
        <input type="password" name="password" id="password" placeholder="Enter Login Password" required class="form-control" /><br>
        <center><button type="submit" name="login" class="btn btn-primary">Login</button></center>
    </form>
    <a href="newreg.php" style="float: right;">New User</a>
    </div>
    <div class="col-lg-4 col-md-4"></div>
</div>
    
<?php
if(isset($_POST['login'])){
    $_SESSION['adhaarnumber'] = $_POST['adhaarnumber'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: voterhome.php');
}
?>

<?php
require_once('footer.html');
?>