<?php include_once './includes/header.php'; 
$link=mysqli_connect('localhost','root','','dpis');
if(!empty($_POST)){
    $mob=$_POST['mob'];
    
    $query= "SELECT * FROM users where mob='$mob'";
    $res=mysqli_query($link,$query);
    
    $data=mysqli_fetch_assoc($res);
    if($mob == $data['mob']){
        session_start();
        $_SESSION['uid']=$data['user_id'];
        $_SESSION['utype']=$data['user_type'];        
        $userType=$data['user_type']; 
        $_SESSION['mob']=$data['mob'];
    if($userType=="Doctor"){     
        header('location:Forgot_Password2.php');
    }
    elseif($userType=="Admin") {
        header('location:Forgot_Password2.php');
    }
    else{
        header('location:Forgot_Password2.php');
    }
}
    else{
        echo "Wrong Email or Mobile!";
    }
}
?>
<style>
    td{
        line-height: 18px;
    }
</style>
<div class="login">
    <br><div class="avatar">
            <img src="./images/stethoscope.png">
        </div>
    <h1 style="padding-top:20px;text-align:center;">Find Your Account</h1><br>
    <div class="wrap">
        
        <form action="" method="post">		

            <input type="tel" placeholder="Enter Mobile No." name="mob" required>
            <div class="bar">
                <i></i>
            </div>
            <button>Submit</button>
        </form>
        </div>
</div>
<br>
<?php include_once './includes/footer.php' ?>

