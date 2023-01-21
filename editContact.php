<?php include_once './includes/header.php'; 
/*
if(empty($_SESSION['uid'])){
 header('location:signIn.php');
     die("You are not logged in!");
  */  
$link=mysqli_connect('localhost','root','','phonebook');
    
if(!empty($_GET)){
    $cid=$_GET['id'];
    $query = "SELECT * FROM pb_contact WHERE c_id='$cid'";
    $res=mysqli_query($link,$query);
    $data=mysqli_fetch_assoc($res);
}

if(!empty($_POST)){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
        $query= "UPDATE pb_contact SET c_name='$name', c_phone='$phone' WHERE c_id='$cid'"; 
        $res=mysqli_query($link,$query);
        if($res){
           header('location:index.php');
        }
        else{
            echo "Error in ".mysqli_error($link);
        }
    }
?>
<div class="container">
       <div class="wrap">
       <h1 style="padding-top:50px;text-align:center;">Edit Contact</h1><br>
        <form action="" method="post">
           	
            <input type="text" name="name" value="<?php echo $data['c_name'] ?>" required>
            <div class="bar">
                <i></i>
            </div>           
            <input type="text" name="phone" value="<?php echo $data['c_phone'] ?>" required>
            <br>
            <button>Update Contact</button>
        </form>
    </div>
</div>

<?php include_once './includes/footer.php' ?>
