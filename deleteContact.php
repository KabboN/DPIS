<?php session_start();

if(empty($_SESSION['uid'])){
 header('location:signIn.php');
     die("You are not logged in!");
 }
$link=mysqli_connect('localhost','root','','phonebook');
if(!empty($_GET)){
    $cid=$_GET['id'];
    $query="DELETE FROM pb_contact WHERE c_id='$cid'";
    $res=mysqli_query($link,$query);
    
        if($res){
           header('location:index.php');
        }
        else{
            echo "Error in ".mysqli_error($link);
        }
    }
?>