<?php
require_once('echeader.php');
?>
<div class="row">
    <div class="col-md-4 col-lg-4"></div>
    <div class="col-md-4 col-lg-4" style="margin: 5px;">
        <form method="post">
            <input type="password" name="oldpwd" id="oldpwd" placeholder="Old Password" required class="form-control" /><br>
            <input type="password" name="newpwd" id="newpwd" placeholder="New Password" required class="form-control" /><br>
            <input type="password" name="cnfpwd" id="cnfpwd" placeholder="Confirm Password" required class="form-control" /><br>
            <center><button type="submit" name="changepassword" class="btn btn-success">Change Password</button></center>
        </form>
        <?php 
        if(isset($_POST['changepassword'])){
            if($_POST['oldpwd']==$_SESSION['loginpwd']){
                if($_POST['newpwd']==$_POST['cnfpwd'] && strlen($_POST['newpwd'])>=8 && strlen($_POST['newpwd'])<=15){
                    $update = mysqli_query($conn,"update ec set adminpwd='".$_POST['newpwd']."' where adminid='".$_SESSION['loginid']."';");
                    if($update){
                        echo('<script>window.alert("Password reset. Please login again."); window.location.href="index.php"; </script>');
                    }else{
                        die('<script>window.alert("Password reset failed. Try Again."); window.location.href="ecchangepwd.php"; </script>');
                    }
                }else{
                    die('<script>window.alert("Password and Confirm Password must be same. Password length between 8 to 15 characters."); window.location.href="ecchangepwd.php"; </script>');
                }
            }else{
                die('<script>window.alert("Invalid Old Password."); window.location.href="ecchangepwd.php";</script>');
            }
        }
        ?>
    </div>
    <div class="col-md-4 col-lg-4"></div>
</div>

<?php 
require_once('footer.html');
?>