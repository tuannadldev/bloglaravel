<?php error_reporting( E_ALL ); ?>



<?php 
$servername = "192.168.216.137";
$username = 'root';
$password = '';
$db = 'dev.hasaki';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully \n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>