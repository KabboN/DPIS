<?php include_once './includes/header.php';

if(empty($_SESSION['uid'])){
    header('location:signIn.php');
    die("You are not logged in!");
}

$uid=$_SESSION['uid'];
$link=mysqli_connect('localhost','root','','phonebook');

?>
<div class="container">

    <h1 style="padding-top:50px;">My Phonebook</h1>

    <div class="nav">
        <ul>
            <li> <a href="addContact.php">Add New Contact</a></li>
            <li> <a href="logOut.php">Log Out</a></li>
        </ul>
    </div>
    <table id="customers">
        <tr>
            <th>Sl#</th>
            <th>Name</th>
            <th>Contact No</th>
            <th>Action</th>
        </tr>
        <?php 
        $query="SELECT * FROM pb_contact WHERE u_id='$uid'";
        $res= mysqli_query($link,$query);
        $sl=1;
        $data=mysqli_fetch_all($res,MYSQLI_ASSOC);
        foreach($data as $value){?>

        <tr>
            <td><?php echo $sl++; ?></td>
            <td><?php echo $value['c_name'] ?></td>
            <td><?php echo $value['c_phone']?></td>
            <td> 
            <a href="editContact.php?id=<?php echo $value['c_id']?>">Edit</a> | 
            <a onclick="return confirm('Are you sure to delete')" href="deleteContact.php?id=<?php echo $value['c_id']?>">Delete</a>
            </td>
        </tr>
        <?php }
        ?>

    </table>
</div>
<?php include_once './includes/footer.php' ?>
