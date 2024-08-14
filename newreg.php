<?php
session_start();
require_once('header.html');
require_once('dbconnection.php');
?>

<div class="row">
    <div class="col-md-12 col-lg-12 bg-dark text-light">
        <h3 style="text-align: center;font-weight: bold;">Online Voting System</h3>
    </div>
</div>

<div class="row" style="margin-top: 10px;">
    <div class="col-lg-4 col-md-4"></div>
    <div class="col-lg-4 col-md-4 mx-auto loginBox">
    <h2 style="text-align: center;">Voter Registration</h2>
    <form method="post">
        <input type="text" name="adhaarnumber" id="adhaarnumber" placeholder="Adhaar Number" required class="form-control" /><br>
        <input type="text" name="fullname" id="fullname" placeholder="Full Name" required class="form-control" /><br>
        <input type="password" name="password" id="password" placeholder="Create Password" required class="form-control" /><br>
        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required class="form-control" /><br>
        <input type="number" name="contact" id="contact" placeholder="Mobile Number" required class="form-control" /><br>
        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="Male"> Male &nbsp;
        <input type="radio" name="gender" value="Female"> Female <br>
        <label for="dob">Date Of Birth</label>
        <input type="date" name="dob" id="dob" required class="form-control" /><br>
        <textarea name="address" id="address" placeholder="Address" required class="form-control"></textarea>
        <br><center><button type="submit" name="enroll" class="btn btn-primary">Enroll</button></center>
    </form>
    <?php
    if(isset($_POST['enroll'])){
        $adhaarnumber = $_POST['adhaarnumber'];
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];
        $contact = $_POST['contact'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $status = 0;        
        $query = "insert into voters values(NULL, '".$adhaarnumber."', '".$fullname."', '".$password."', '".$contact."', '".$gender."', '".$dob."', '".$address."', '".$status."');"; 
        $insert = mysqli_query($conn, $query);
        if(!$insert){
            die("<script>alert('Registration Failed');window.location.href='newreg.php';</script>");
        }
        echo("<script>alert('Registration Success');window.location.href='index.php';</script>");
    }
    ?>
    </div>
    <div class="col-lg-4 col-md-4"></div>
</div><br>

<?php
require_once('footer.html');
?>