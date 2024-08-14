<?php
require_once('echeader.php');

$voterreqs = mysqli_query($conn, "SELECT * from voters where status='0';");
$noOfvReqs = mysqli_num_rows($voterreqs);

$partyreqs = mysqli_query($conn, "SELECT * from party where status='0';");
$noOfpReqs = mysqli_num_rows($partyreqs);

?>

<div class="row" style="margin-top: 10px;">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-lg-8 col-md-8" style="display: flex;text-align: center;">
        <a name="vstatus" href="echome.php?vstatus=true">
        <div class="dashboard">
            <h3 style="font-weight: bold;text-align: center;"><?php echo $noOfvReqs; ?></h3>
            <h4>Voter Requests</h4>
        </div>
        </a>
        <a name="pstatus" href="echome.php?pstatus=true">
        <div class="dashboard">
            <h3 style="font-weight: bold;text-align: center;"><?php echo $noOfpReqs; ?></h3>
            <h4>Party Requests</h4>
        </div>
        </a>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>

<?php
if(isset($_GET['vstatus']) && $noOfvReqs!=0){
?>
    <table class="table table-bordered table-striped">
        <tr style="text-align: center;">
            <th>S.No.</th>
            <th>Aadhaar Number</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Contact</th>
            <th>Address</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        $sno = 1;
        while($vr = mysqli_fetch_array($voterreqs)){
        ?>
            <tr>
                <td><?php echo $sno++; ?></td>
                <td><?php echo $vr['adhaarnumber']; ?></td>
                <td><?php echo $vr['fullname']; ?></td>
                <td><?php echo $vr['gender']; ?></td>
                <td><?php echo $vr['dob']; ?></td>
                <td><?php echo $vr['contact']; ?></td>
                <td><?php echo $vr['address']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="voterrecid" value="<?php echo $vr['id']; ?>">
                        <button type="submit" name="accept" class="btn btn-success">Accept</button>
                    </form>
                    <?php
                    if(isset($_POST['accept'])){
                        $update = mysqli_query($conn,"update voters set status='1' where id=".$_POST['voterrecid'].";");
                        if(!$update){
                            die("<script>alert('Database Error. Try Again');window.location.href='echome.php';</script>");
                        }
                        echo("<script>window.location.href='echome.php';</script>");
                    }
                    ?>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="voterrecid" value="<?php echo $vr['id']; ?>">
                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    </form>
                    <?php
                    if(isset($_POST['delete'])){
                        $del = mysqli_query($conn,"delete from voters where id=".$_POST['voterrecid'].";");
                        if(!$del){
                            die("<script>alert('Database Error. Try Again');window.location.href='echome.php';</script>");
                        }
                        echo("<script>window.location.href='echome.php';</script>");
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}else if(isset($_GET['pstatus']) && $noOfpReqs!=0){
    ?>
    <table class="table table-bordered table-striped">
        <tr style="text-align: center;">
            <th>S.No.</th>
            <th>Nomination Type</th>
            <th>Full Name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>E-Mail ID</th>
            <th>Contact</th>
            <th>Party Name</th>
            <th>Address</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        $sno = 1;
        while($pr = mysqli_fetch_array($partyreqs)){
        ?>
            <tr>
                <td><?php echo $sno++; ?></td>
                <td><?php echo $pr['nominationtype']; ?></td>
                <td><?php echo $pr['fullname']; ?></td>
                <td><?php echo $pr['dob']; ?></td>
                <td><?php echo $pr['gender']; ?></td>
                <td><?php echo $pr['nationality']; ?></td>
                <td><?php echo $pr['email']; ?></td>
                <td><?php echo $pr['phone']; ?></td>
                <td><?php echo $pr['partyname']; ?></td>
                <td><?php echo $pr['address']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="partyrecid" value="<?php echo $pr['id']; ?>">
                        <button type="submit" name="accept" class="btn btn-success">Accept</button>
                    </form>
                    <?php
                    if(isset($_POST['accept'])){
                        $update = mysqli_query($conn,"update party set status='1' where id=".$_POST['partyrecid'].";");
                        if(!$update){
                            die("<script>alert('Database Error. Try Again');window.location.href='echome.php';</script>");
                        }
                        echo("<script>window.location.href='echome.php';</script>");
                    }
                    ?>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="voterrecid" value="<?php echo $vr['id']; ?>">
                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    </form>
                    <?php
                    if(isset($_POST['delete'])){
                        $del = mysqli_query($conn,"delete from voters where id=".$_POST['voterrecid'].";");
                        if(!$del){
                            die("<script>alert('Database Error. Try Again');window.location.href='echome.php';</script>");
                        }
                        echo("<script>window.location.href='echome.php';</script>");
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}
?>

<?php
require_once('footer.html');
?>