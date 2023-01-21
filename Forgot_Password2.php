<?php include_once './includes/header.php'; 
$link=mysqli_connect('localhost','root','','dpis');
if(!empty($_POST)){
    $mob=$_POST['mob'];
    

    $query= "SELECT * FROM users where mob='$mob'";
    $res=mysqli_query($link,$query);
    
    $data=mysqli_fetch_assoc($res);
    if($SequrityAns == $data['SequrityAns']){
        session_start();
        
    if($userType=="Doctor"){     
        header('location:Forgot_Password3.php');
    }
    elseif($userType=="Admin") {
        header('location:Forgot_Password3.php');
    }
    else{
        header('location:Forgot_Password3.php');
    }
}
    else{
        echo "Wrong Answer!";
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
    <h1 style="padding-top:20px;text-align:center;">Reset Your Password</h1><br>
    <div class="wrap">
        
        <form action="" method="post">		
        Choose a Sequrity Question:  
            <div class='bar'>
    <i></i>
</div>
<select>  
  <option value="What is Your Favorite Color?">What is Your Favorite Color?</option>}  
  <option value="What is Your Father's Middle Name?">What is Your Father's Middle Name?</option>  
  <option value="Where is Your Birthplace?">Where is Your Birthplace?</option>  
  <option value="What is Your First Teacher Name?">What is Your First Teacher Name?</option>  
  <option value="What is Your Grandparents Name?">What is Your Grandparents Name?</option>  
  <option value="What is Your Favorite Food?">What is Your Favorite Food?</option>  
  </select>   
<div class='bar'>
    <i></i>
</div>
            <input type="tel" placeholder="Enter Your Answer" name="SequrityAnswer" required>
            <div class="bar">
                <i></i>
            </div>
            <br>  <br>
            <button>Submit</button>
        </form>
        
    </div>
</div>
<br>
<?php include_once './includes/footer.php' ?>

