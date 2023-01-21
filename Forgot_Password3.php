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

        $insrtDoc="INSERT INTO doctors(user_id,doc_name,doc_bmdc,doc_nid,doc_degree,doc_designation,doc_institute,doc_dob,doc_address,Sequrity_Ques) values('$user_id','$name','$bmdc','$nid','$degree','$designation','$institute','$dob','$address','$Sequrity')";
        $resDoc=mysqli_query($link,$insrtDoc);
        
        if($resDoc && $resUsr){
            header('location:signIn.php');
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
    <h1 style="padding-top:10px;text-align:center;">Set New Password!!</h1><br>
    <div class="wrap">
        
        <form action="" method="post">		
            
            <input type="password" id="pass" placeholder="New Password" name="password" required>
            <div class="bar">
                <i></i>
            </div>            
            <input type="password" id="repass" placeholder="Retype New Password" name="conpass" data-rule-equalTo="#pass" required>
            <div class="bar">
                <i></i>
            </div>
           
            <div class="bar">
                <i></i>
            </div>
            <br style="padding-top:20px;">
            <button>Submit</button>
        </form>
        </div>
</div>

<?php include_once './includes/footer.php' ?>
  
