<?php 
include_once './includes/header.php';  
$link=mysqli_connect('localhost','root','','dpis');

    $idquery="SELECT max(user_id) from users";
    $idres=mysqli_query($link,$idquery);
    $user_no=mysqli_fetch_row($idres);
    if($user_no[0]==0){
        $user_id=1001;
    }
    else{
    $user_id=++$user_no[0]; 
    }

if(!empty($_POST)){
    $name=$_POST['doc_name'];
    $mob=$_POST['doc_mob'];
    $bmdc=$_POST['doc_bmdc'];
    $email=$_POST['doc_email'];
    $nid=$_POST['doc_nid'];
    $degree=$_POST['doc_degree'];
    $designation=$_POST['doc_designation'];
    $institute=$_POST['doc_institute'];
    $dob=$_POST['doc_dob'];
    $address=$_POST['doc_address'];
    $password=($_POST['password']);
    $conpass=$_POST['conpass'];
    $pass=md5($password);
    if($password==$conpass){

        $insrtUsr="INSERT into users(mob,email,user_type,password) values ('$mob','$email','Doctor','$pass')";
        $resUsr=mysqli_query($link,$insrtUsr);

        $insrtDoc="INSERT INTO doctors(user_id,doc_name,doc_bmdc,doc_nid,doc_degree,doc_designation,doc_institute,doc_dob,doc_address) values('$user_id','$name','$bmdc','$nid','$degree','$designation','$institute','$dob','$address')";
        $resDoc=mysqli_query($link,$insrtDoc);
        
        if($resDoc && $resUsr){
            header('location:signIn.php');
        }
        else{
            echo "Registration Failed";
        }
    }
    else{
        echo "Password doesn't Match!";
    }
    }
?>
<style>
    td{
        line-height: 18px;
    }
</style>
<div class="registration">
    <div class="avatar">
            <img src="./images/doctoricon.png">
        </div>
    <h1 style="padding-top:10px;text-align:center;">DPIS Doctor Registraton</h1><br>
    <div class="wrap">
        
        <form action="" method="post">		
            <input type="text" placeholder="Dr. Full Name" name="doc_name" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="tel" placeholder="Mobile Number" name="doc_mob" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="number" placeholder="BMDC Number" name="doc_bmdc" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="email" placeholder="Email Address" name="doc_email" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="number" placeholder="NID" name="doc_nid" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" placeholder="Degrees (Use comma to separate)" name="doc_degree" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" placeholder="Designation" name="doc_designation" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" placeholder="Institute" name="doc_institute" required>
            <div class="bar">
                <i></i>
            </div>
            <input placeholder="Date of Birth" class="textbox-n" type="text" onfocus="(this.type='date')" name="doc_dob" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" placeholder="Address" name="doc_address" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="password" id="pass" placeholder="Password" name="password" required>
            <div class="bar">
                <i></i>
            </div>            
            <input type="password" id="repass" placeholder="Retype Password" name="conpass" data-rule-equalTo="#pass" required>
            <div class="bar">
                <i></i>
            </div>
            <p style="font-size: 14px; color:grey;margin-left: 12px;">Upload Photograph (300px X 300px)</p> 
            <input type="file" placeholder="Photograph" name="doc_photo" >
            <div class="bar">
                <i></i>
            </div>
            <p style="font-size: 14px; color:grey;margin-left: 12px;">Upload NID (560px X 350px)</p>
            <input type="file" placeholder="NID" name="doc_nid">
            <div class="bar">
                <i></i>
            </div>
            <br style="padding-top:20px;">
            <button>Sign Up</button>
        </form>
        <p style="margin:20px;text-align:center;">Already have an account?<a href="signIn.php"> Sign In</a></p>
    </div>
</div>

<?php include_once './includes/footer.php' ?>
  
