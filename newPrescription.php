<?php include_once './includes/header.php'; 
if(empty($_SESSION['uid'])){
    header('location:signIn.php');
    die("You are not logged in!");
}
        $link=mysqli_connect('localhost','root','','dpis');
        $uid= $_SESSION['uid'];
        $docMob=$_SESSION['mob'];
        $docQuery= "SELECT * FROM doctors where user_id='$uid'";
        $docRes=mysqli_query($link,$docQuery);    
        $docData=mysqli_fetch_assoc($docRes);
        $docName=$docData['doc_name'];
        $docDeg=$docData['doc_degree'];
        $docAdd=$docData['doc_address'];
        $docBmdc=$docData['doc_bmdc'];

    if(!empty($_POST)){
        
        

/*        $docQuery = "INSERT INTO pb_contact(c_name,c_phone,u_id) VALUES('$name','$phone','$uid')";
        $res=mysqli_query($link,$query);
       if($res){
            header('location:index_doc.php');
        }
    else{
            echo "Error in".mysqli_error($link);
        }
 */   }
?>
<style>
    td{
        line-height: 18px;
    }
</style>
<div class="prescription">
    <h1 style="padding-top:20px;text-align:center;">New Prescription</h1><br>
    <div class="search">
        <form action="" method="GET">
        <input id="search" name="id" type="text" placeholder="Input Patient ID">
        <input id="submit" type="submit" value="Search Patient">
        </form>
    </div>
    <br>
   <div class="docInfo">
    <h4>Doctor Information</h4>
    <p><?php echo $docName ?></p>
   <p><?php echo $docDeg ?></p>
   <p><?php echo "BMDC No :".$docBmdc ?></p>
   <p><?php echo "Mob :".$docMob ?></p>
   <p><?php echo "Address :".$docAdd ?></p>
   </div>
   <div class="patInfo">
    <h4>Patient Information</h4>
     <p>Patient Name:</p>
     <p>Patient Age:</p>
     <p>Contact:</p>
     <p>Address: </p>
   </div>
   <div class="hr">
    <hr>
   </div>
   <div class="container">
    <div class="wrap">

        <form>
  <div class="form-row">
    <div class="col-7">
      <input type="text" class="form-control" placeholder="City">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="State">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Zip">
    </div>
  </div>
</form>
    </div>

   </div>
    <div class="wrap">

        <form action="" method="post">		
            <input type="text" placeholder="Contact Name" name="name" value="Ahad Mosharraf">
            <div class="bar">
                <i></i>
            </div>
            <input type="text" placeholder="Contact No" name="phone" required>
            <br>
            <button>Submit</button>
            <p style="text-align:center;margin-top:10px;"><a href="index_doc.php">Go Back</a></p>
        </form>
    </div>
</div>
<?php include_once './includes/footer.php' ?>
