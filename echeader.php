<?php
session_start();
require_once('header.html');
require_once('dbconnection.php');

if(!isset($_SESSION['loginid']) && !isset($_SESSION['loginpwd'])){
    die("<script>alert('Session Expired. Login Again');window.location.href='index.php';</script>");
}

$adminrec = mysqli_query($conn,"select * from ec where adminid='".$_SESSION['loginid']."' and adminpwd='".$_SESSION['loginpwd']."';");
if(mysqli_num_rows($adminrec)!=1){
    die("<script>alert('Invalid Login ID or Password. Try Again');window.location.href='index.php';</script>");
}
?>

<nav class="navbar navbar-expand-md bg-dark navbar-dark" style="width: 100%;height: auto;padding: 0px 10px;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mainmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse justify-content-center" id="mainmenu">
        <ul class="nav navbar-nav" style="font-weight: bold;">
            <li class="nav-item"><a href="echome.php" class="nav-link text-light">Home</a></li>
            <li class="nav-item"><a href="voterslist.php" class="nav-link text-light">Voters</a></li>
            <li class="nav-item"><a href="partieslist.php" class="nav-link text-light">Political Parties</a></li>
            <li class="nav-item"><a href="event.php" class="nav-link text-light">Polling Event</a></li>
            <li class="nav-item"><a href="ecchangepwd.php" class="nav-link text-light">Change Password</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-light">Logout</a></li>
        </ul>
    </div>
</nav>