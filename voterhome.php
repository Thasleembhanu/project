<?php
session_start();
require_once('header.html');
require_once('dbconnection.php');
$adhaarnumber = $_SESSION['adhaarnumber'];
$password = $_SESSION['password'];
$q = "select * from voters where adhaarnumber='".$adhaarnumber."' and password='".$password."';";
$voterdata = mysqli_query($conn,$q);
if(mysqli_num_rows($voterdata)!=1){
    die("<script>alert('Invalid Login or Password');window.location.href='index.php';</script>");
}

$vd = mysqli_fetch_array($voterdata);
if($vd['status']=='0'){
    die("<script>alert('EC not yet accept request.Please Try Again');window.location.href='index.php';</script>");
}

?>

<div class="row" style="margin-top: 10px;">
    <div class="col-md-12 col-lg-12 bg-dark text-light">
        <h3 style="text-align: center;font-weight: bold;">Online Voting System</h3>
    </div>
</div>

<div class="row" style="margin-top: 10px;">
    <div class="col-md-12 col-lg-12" style="text-align: right;">
        <form action="logout.php" method="post">
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
</div>

<div class="row" style="margin-top: 10px;">
    <div class="col-md-12 col-lg-12">
        <h3 style="text-align: left;font-weight: bold;">Welcome <?php echo strtoupper($vd['fullname']); ?></h3>
    </div>
</div>

<?php
$politicalmembers = array();
$members1 = mysqli_query($conn, "select id, fullname, partyname, nominationtype from party where status='1' and nominationtype='assembly';");
$members2 = mysqli_query($conn, "select id, fullname, partyname, nominationtype from party where status='1' and nominationtype='parliament';");
?>

<div class="row" style="margin-top: 10px;">
    <div class="col-md-1 col-lg-1"></div>
    
    <div class="col-md-4 col-lg-4 mx-auto loginBox">
        <h4 style="font-weight: bold;text-align: center">Assembly</h4>
        <form method="post">
            <select name="party" id="party" required class="form-control">
                <option value="" disabled selected>--Select Party & Member--</option>
                <?php
                while($m = mysqli_fetch_array($members1)){
                ?>
                    <option value="<?php echo $m['id']; ?>"><?php echo $m['partyname']."-".$m['fullname']; ?></option>
                <?php
                }
                ?>
                <option value="nota">Nota</option>
            </select><br>
            <center><button type="submit" name="avote" class="btn btn-primary">VOTE</button></center>
        </form>
        <?php
        if(isset($_POST['avote'])){
            $votedata = mysqli_query($conn,"SELECT * from electionvoting where voterid=".$vd['id']." and  nominationtype='assembly' ;");
            if(mysqli_num_rows($votedata)!=0){
                die("<script>alert('Already cast vote');window.location.href='voterhome.php';</script>");
            }
            $partyid = $_POST['party'];
            $nominationtype='assembly';
            $recs = mysqli_query($conn,"select partyname from party where id=".$_POST['party'].";");
            $rec = mysqli_fetch_array($recs);
            $q = "insert into electionvoting values(NULL, ".$vd['id'].", '".$rec['partyname']."', ".$partyid.",'".$nominationtype."');";
            $insert = mysqli_query($conn,$q);
            if(!$insert){
                die("<script>alert('Database Error'. Try Again.);window.location.href='voterhome.php';</script>");
            }
            echo("<script>alert('Voted successfully.');window.location.href='voterhome.php';</script>");
        }
        ?>
    </div>

    <div class="col-md-2 col-lg-2"></div>

    <div class="col-md-4 col-lg-4 mx-auto loginBox">
        <h4 style="font-weight: bold;text-align: center">Parliament</h4>
        <form method="post">
            <select name="party" id="party" required class="form-control">
                <option value="" disabled selected>--Select Party & Member--</option>
                <?php
                while($m = mysqli_fetch_array($members2)){
                ?>
                    <option value="<?php echo $m['id'] ?>"><?php echo $m['partyname']."-".$m['fullname']; ?></option>
                <?php
                }
                ?>
                <option value="nota">Nota</option>
            </select><br>
            <center><button type="submit" name="pvote" class="btn btn-primary">VOTE</button></center>
        </form>
        <?php
        if(isset($_POST['pvote'])){
            $votedata = mysqli_query($conn,"SELECT * from electionvoting where voterid=".$vd['id']." and  nominationtype='parliament' ;");
            if(mysqli_num_rows($votedata)!=0){
                die("<script>alert('Already cast vote');window.location.href='voterhome.php';</script>");
            }
            $partyid = $_POST['party'];
            $nominationtype='parliament';
            $recs = mysqli_query($conn,"select partyname from party where id=".$_POST['party'].";");
            $rec = mysqli_fetch_array($recs);
            $q = "insert into electionvoting values(NULL, ".$vd['id'].", '".$rec['partyname']."', ".$partyid.",'".$nominationtype."');";
            $insert = mysqli_query($conn,$q);
            if(!$insert){
                die("<script>alert('Database Error'. Try Again.);window.location.href='voterhome.php';</script>");
            }
            echo("<script>alert('Voted successfully.');window.location.href='voterhome.php';</script>");
        }
        ?>
    </div>

    <div class="col-md-1 col-lg-1"></div>
</div><br>

<?php
require_once('footer.html');
?>