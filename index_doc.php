<?php include_once './includes/header.php';

if(empty($_SESSION['uid'])){
    header('location:signIn.php');
    die("You are not logged in!");
}

$uid=$_SESSION['uid'];
$link=mysqli_connect('localhost','root','','dpis');
$nm="SELECT doc_name,flag_verify FROM doctors WHERE user_id='$uid'";
$res= mysqli_query($link,$nm);
$data=mysqli_fetch_assoc($res);
$name=$data["doc_name"];
$flag=$data['flag_verify'];
?>
<div class="container">

    <h1 style="padding-top:50px;"><?php echo'Welcome'." ".$name ?></h1>
<?php 
if($flag==1){
    echo "<h3> <font color=blue> Profile Status: Verified</font> </h3>";
}
else{
echo "<h3> <font color=red> Profile Status: Verification Pending</font> </h3>";
echo "<p> <font color=grey size='2px'> Authority will review your registration and approve/reject your profile soon, meanwhile your could email us to info@dpis.gov.bd for any assistance.</font> </p>";
}
?>
    <div class="nav">
        <ul>
            <li> <a href="newPrescription.php">New Prescription</a></li>
            <li> <a href="logOut.php">Log Out</a></li>
        </ul>
    </div>
    <table id="customers">
        <tr>
            <th>Sl#</th>
            <th>Prescrip ID</th>
            <th>Patient Name</th>
            <th>Date</th>
        </tr>
        <?php 
        $query="SELECT * FROM prescriptions WHERE u_id='$uid'";
        $res= mysqli_query($link,$query);
        $sl=1;
        $data=mysqli_fetch_all($res,MYSQLI_ASSOC);
        foreach($data as $value){?>

        <tr>
            <td><?php echo $sl++; ?></td>
            <td><?php echo $value['pres_id'] ?></td>
            <td><?php echo $value['pat_name']?></td>
            <td><?php echo $value['date']?></td>
        </tr>        
        <tr>
            <td><?php echo $sl++; ?></td>
            <td>1002</td>
            <td>1</td>
            <td>10.12.2022</td>
        </tr>
        <?php }
        ?>

    </table>
</div>
<?php include_once './includes/footer.php' ?>
