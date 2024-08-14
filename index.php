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
    <div class="col-lg-4 col-md-4"></div>
    <div class="col-lg-4 col-md-4" style="text-align: right;">
        <strong>LOGIN :: </strong>
        <a name="ec" href="ec.php" class="btn btn-warning">EC</a> 
        <a name="party" href="party.php" class="btn btn-primary">Party</a> 
        <a name="voter" href="voter.php" class="btn btn-success">Voter</a>
    </div>
</div>

<div class="row" style="margin-top: 10px;">
    <div class="col-lg-6 col-md-6" style="text-align: center;padding: 100px;background-color: #E6E6FA;">
        <h2>Nomination Date</h2>
        <p>13 April 2024</p>
    </div>
    <div class="col-lg-6 col-md-6" style="text-align: center;padding: 100px;background-color: lightgray;">
        <h2>Election/Voting Date</h2>
        <p>13 May 2024</p>
    </div>
</div><br>

<?php
require_once('footer.html');
?>