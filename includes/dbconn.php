<?php
$hostname = "localhost";
$username = "root";
$password = "";

try {
    $dbh = new PDO("mysql::host=&hostname;dbname=dpis", $username, $password);
}
catch (PDOException $e) {
    echo $e->getMessage();
}
?>
