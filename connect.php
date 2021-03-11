<?php
$servername = "localhost";
$username = "yihsiu";
$password = "GcmqbvloKtitKADQ";
$dbname = "yihsiu";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    showErrorPage("Connection failed: " . $e->getMessage());
    // exit();
}

$siteName = getSiteName($conn)[0];

function showErrorPage($msg) {
    header("Location: errors/db-error.php?msg=".$msg);
}

function getSiteName($conn) {
    $sql = "select setting_value from site_settings where setting_name='Site Name'";
    $stmt = $conn->query($sql);
    return $stmt->fetch();
}
?>