<?php
require_once('header.html');
require_once('dbconnection.php');
?>

<div class="row">
    <div class="col-md-12 col-lg-12 bg-dark text-light">
        <h3 style="text-align: center;font-weight: bold;">Online Voting System</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-lg-4"></div>
    <div class="col-md-4 col-lg-4 mx-auto loginBox">
    <h4 style="font-weight: bold;text-align: center;">Nomination Form</h4>
    <form method="post">
        <select id="nominationtype" name="nominationtype" required class="form-control">
            <option value="" disabled selected>--Select Nomination Type--</option>
            <option value="assembly">Assembly</option>
            <option value="parliament">Parliament</option>
        </select><br>
        <input type="text" id="fullname" name="fullname" placeholder="Enter Full Name" required class="form-control"><br>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required class="form-control"><br>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required class="form-control">
            <option value="" disabled selected>--Select Gender--</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br>
        <input type="text" id="nationality" name="nationality" placeholder="Nationality" required class="form-control" /><br>        
        <input type="email" id="email" name="email" placeholder="Enter E-Mail ID" required class="form-control" /><br>
        <input type="tel" id="phone" name="phone" placeholder="Contact" required class="form-control" /><br>       
        <input type="text" id="partyname" name="partyname" placeholder="Enter Party Name" required class="form-control"><br>
        <textarea id="address" name="address" placeholder="Enter Address" required class="form-control"></textarea><br>
        <center><button type="submit" name="nominate" class="btn btn-primary">Submit</button></center>
    </form>
    <?php
    if(isset($_POST['nominate'])){
        $nominationtype = $_POST['nominationtype'];
        $fullname = $_POST['fullname'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $nationality = $_POST['nationality'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $partyname = $_POST['partyname'];
        $address = $_POST['address'];
        $status = '0';        
        $query = "insert into party values(NULL, '".$nominationtype."', '".$fullname."', '".$dob."', '".$gender."', '".$nationality."', '".$email."', '".$phone."', '".$partyname."', '".$address."', '".$status."');";
        //echo $query; 
        $insert = mysqli_query($conn, $query);
        if(!$insert){
            die("<script>alert('Registration Failed');window.location.href='party.php';</script>");
        }
        echo("<script>alert('Registration Success');window.location.href='index.php';</script>");
    }
    ?>
    </div>
    <div class="col-md-4 col-lg-4"></div>
</div><br>

<?php
require_once('footer.html');
?>