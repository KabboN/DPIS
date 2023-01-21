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
    $name=$_POST['pat_name'];
    $mob=$_POST['pat_mob'];
    $email=$_POST['pat_email'];
    $nid=$_POST['pat_nid'];
    $dob=$_POST['pat_dob'];
    $address=$_POST['pat_address'];
    $password=($_POST['password']);
    $conpass=$_POST['conpass'];
    $pass=md5($password);
    if($password==$conpass){

        $insrtUsr="INSERT into users(mob,email,user_type,password) values ('$mob','$email','Patient','$pass')";
        $resUsr=mysqli_query($link,$insrtUsr);

        $insrtPat="INSERT INTO patients(user_id,pat_name,pat_nid,pat_dob,pat_add) values('$user_id','$name','$nid','$dob','$address')";
        $resPat=mysqli_query($link,$insrtPat);
        
        if($resUsr && $resPat){
 //           echo '<p id="success-message">Registration Successful</p>';
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
            <img src="./images/patient.jpg">
        </div>
    <h1 style="padding-top:10px;text-align:center;">DPIS Patients Registraton</h1><br>
    <div class="wrap">
        
        <form action="" method="post">      
            <input type="text" placeholder="Full Name" name="pat_name" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="tel" placeholder="Mobile Number" name="pat_mob" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="email" placeholder="Email Address" name="pat_email" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="number" placeholder="NID Number" name="pat_nid" required>
            <div class="bar">
                <i></i>
            </div>
            <input placeholder="Date of Birth" class="textbox-n" type="text" onfocus="(this.type='date')" name="pat_dob" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="text" placeholder="Address" name="pat_address" required>
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
            <input type="file" placeholder="Photograph" name="pat_photo">
            <div class="bar">                 
                <i></i>
            </div>
            <p style="font-size: 14px; color:grey;margin-left: 12px;">Upload NID (560px X 350px)</p> 
            <input type="file" placeholder="NID" name="pat_nid" >
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
  
<script>
  setTimeout(function(){
    document.getElementById('success-message').style.display = 'none';
    /* or
    var item = document.getElementById('info-message')
    item.parentNode.removeChild(item); 
    */
  }, 3000);
</script>