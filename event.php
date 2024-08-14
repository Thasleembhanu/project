<?php
require_once('echeader.php');
$partynames = array();
$assemblyresults = [];
$parliamentresults = [];
?>

<div class="row" style="margin-top: 10px;">
    <div class="col-md-4 col-lg-4"></div>
    <div class="col-md-4 col-lg-4">
        <table class="table table-bordered table-striped">
            <tr align="center">
                <th>S. No.</th>
                <th>Name of Person</th>
                <th>Party</th>
                <th>No. of Votes</th>
                <th>Nominate To</th>
            </tr>
            <?php
            $sno = 1;
            $nominationtype = ["assembly","parliament"];
            foreach ($nominationtype as $value) {
                $q1 = "SELECT id, fullname, partyname from party where nominationtype='".$value."';";
                $precs = mysqli_query($conn,$q1);
                while($pr = mysqli_fetch_array($precs)){
                    $q2 = "SELECT * from electionvoting where nomineeid=".$pr['id'].";";
                    $result = mysqli_query($conn,$q2);
                ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $pr['fullname']; ?></td>
                        <td><?php array_push($partynames,$pr['partyname']); echo $pr['partyname']; ?></td>
                        <?php if($value == "assembly"){ ?>
                        <td><?php $assemblyresults[$pr['partyname']] = mysqli_num_rows($result); echo mysqli_num_rows($result); ?></td>
                        <td><?php echo $value; ?></td>
                        <?php 
                        }else{ ?>
                        <td><?php $parliamentresults[$pr['partyname']] = mysqli_num_rows($result); echo mysqli_num_rows($result); ?></td>
                        <td><?php echo $value; ?></td>
                        <?php
                        }
                        ?>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
    <div class="col-md-4 col-lg-4"></div>
</div>

<div class="row" style="margin-top:10px;">
    <div class="col-md-3 col-lg-3"></div>
    <div class="col-md-6 col-lg-6">
        <h3 style="font-weight: bold;text-align: center;">Majority in Elections</h3>
        <?php
        $amaxparty = '';
        $pmaxparty = '';
        $amax = 0;
        $pmax = 0;
        foreach($assemblyresults as $pname => $pvalue){
            if($amax<$pvalue){
                $amaxparty = $pname;
                $amax = $pvalue;
            }
        }
        foreach($parliamentresults as $pname => $pvalue){
            if($pmax<$pvalue){
                $pmaxparty = $pname;
                $pmax = $pvalue;
            }
        }
        ?>
        <div style="display: flex;">
            <center>
            <div style="text-align: center;margin: 30px;width: 200px;height: auto;border-style: solid;border-radius: 10px;border-color: white;box-shadow: 3px 3px 5px gray;display: inline-block;">
                <h4 style="text-transform: uppercase"><?php echo $amaxparty; ?></h4>
                <h6><?php echo $amax; ?></h6>
            </div>
            <div style="text-align: center;margin: 30px;width: 200px;height: auto;border-style: solid;border-radius: 10px;border-color: white;box-shadow: 3px 3px 5px gray;display: inline-block;">
                <h4 style="text-transform: uppercase"><?php echo $pmaxparty; ?></h4>
                <h6><?php echo $pmax; ?></h6>
            </div>
            </center>
        </div>
    </div>
    <div class="col-md-3 col-lg-3"></div>
</div>

<?php
require_once('footer.html');
?>