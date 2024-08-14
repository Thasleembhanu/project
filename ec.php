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
        <h2 style="font-weight: bold;text-align: center">EC Login</h2>
        <form method="post">
            <input type="text" name="loginid" id="loginid" placeholder="Enter EC Loginid" required class="form-control" /><br>
            <input type="password" name="loginpwd" id="loginpwd" placeholder="Enter EC Login Password" required class="form-control" /><br>
            <center><button type="submit" name="login" class="btn btn-primary">Login</button></center>
        </form>
        <?php
        if(isset($_POST['login'])){
            $_SESSION['loginid'] = $_POST['loginid'];
            $_SESSION['loginpwd'] = $_POST['loginpwd'];
            header('Location: echome.php');
        }
        ?>
    </div>
    <div class="col-lg-4 col-md-4"></div>
</div>

<?php
require_once('footer.html');
?>