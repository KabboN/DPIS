<?php include_once './includes/header.php'; 
$link=mysqli_connect('localhost','root','','dpis');
if(!empty($_POST)){
    $mob=$_POST['mob'];
    $password=md5($_POST['password']);

    $query= "SELECT * FROM users where mob='$mob'";
    $res=mysqli_query($link,$query);
    
    $data=mysqli_fetch_assoc($res);
    if($password == $data['password']){
        session_start();
        $_SESSION['uid']=$data['user_id'];
        $_SESSION['utype']=$data['user_type'];        
        $userType=$data['user_type']; 
        $_SESSION['mob']=$data['mob'];
    if($userType=="Doctor"){     
        header('location:index_doc.php');
    }
    elseif($userType=="Admin") {
        header('location:index_admin.php');
    }
    else{
        header('location:index.php');
    }
}
    else{
        echo "Wrong Email or Password!";
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
    <h1 style="padding-top:20px;text-align:center;">Sign in to continue</h1><br>
    <div class="wrap">
        
        <form action="" method="post">		

            <input type="tel" placeholder="Enter Mobile No." name="mob" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="password" placeholder="Password" name="password" required>
            <br>  <br>
            <button>Sign In</button>
        </form>
        <p style="margin-top:10px;text-align:center;">Do not have an account?<a href="registerAs.php"> Register Now</a></p>
    </div>
</div>
<br>
<?php include_once './includes/footer.php' ?>

