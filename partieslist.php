<?php
require_once('echeader.php');

$partieslist = mysqli_query($conn,"SELECT * from party where status='1';");
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
                <th>Party Name</th>
                <th>Nomination Type</th>
                <th>Address</th>
            </tr>
            <?php
            if(mysqli_num_rows($partieslist)==0){
                echo("<tr><td colspan='7' style='text-align: center;font-style: italic'>No records found</td></tr>");
            }else{
            $sno = 1;
            while($p = mysqli_fetch_array($partieslist)){
                echo("<tr>
                <td>".$sno++."</td>
                <td>".$p['fullname']."</td>
                <td>".$p['gender']."</td>
                <td>".$p['dob']."</td>
                <td>".$p['partyname']."</td>
                <td>".$p['nominationtype']."</td>
                <td>".$p['address']."</td>
                </tr>");
            }
            }
            ?>
        </table>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>
<?php
require_once('footer.html');
?>