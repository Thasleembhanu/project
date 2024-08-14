<?php
require_once('echeader.php');

$voterslist = mysqli_query($conn,"SELECT fullname, gender, dob, address from voters where status='1';");
?>

<div class="row" style="margin-top: 10px;">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-lg-8 col-md-8">
        <table class="table table-bordered table-striped">
            <tr style="text-align: center;">
                <th>S.No.</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Address</th>
            </tr>
            <?php
            $sno = 1;
            while($v = mysqli_fetch_array($voterslist)){
                echo("<tr>
                <td>".$sno++."</td>
                <td>".$v['fullname']."</td>
                <td>".$v['gender']."</td>
                <td>".$v['dob']."</td>
                <td>".$v['address']."</td>
                </tr>");
            }
            ?>
        </table>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>
<?php
require_once('footer.html');
?>