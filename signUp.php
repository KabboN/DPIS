<?php 
include_once './includes/header.php'; 
include_once './includes/dbconn.php'; 
?>

<style>
    td{
        line-height: 18px;
    }
</style>
<div class="container">
    <h1 style="padding-top:50px;text-align:center;">DPIS-Doctor Patient Information System</h1><br>
    <h2 style="padding-top:0px;text-align:center;">Sign in to continue</h2><br>
    <div class="wrap">
        <div class="avatar">
            <img src="./images/stethoscope.png">
        </div>
        <form>
<label>Register As</label>
  <select onchange="typeCheck(this);">
    <option value="">Please Select</option>
    <option value="doctor">Doctor</option>
    <option value="patient">Patient</option>
 
</select>

<div id="ifDoc" style="display: none;">
    <label for="doc_name">Doctor Full Name</label> <input type="text" name="doc_name" />
    <label for="doc_mob">Contact No</label> <input type="text" name="doc_mob" />
    <br/>
    
</div>
<div id="ifPat" style="display: none;">    
    <label for="pat_name">Patient Full Name</label> <input type="text" name="doc_name" />
    <label for="pat_mob">Pat Contact No</label> <input type="text" name="doc_mob" />
</div>
</form>
        <p style="margin-top:10px;text-align:center;">Already have an account? Sign In<a href="signIn.php"></a></p>
    </div>
</div>
<?php include_once './includes/footer.php' ?>
