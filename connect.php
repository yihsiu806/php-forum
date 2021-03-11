<?php
$host = "localhost";
$db = "yihsiu";
$user = "yihsiu";
$pass = "GcmqbvloKtitKADQ";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // throw new PDOException($e->getMessage(), (int)$e->getCode());
    showErrorPage("Connection failed: " . $e->getMessage());
}

$siteName = getSiteName($pdo)[0];

function showErrorPage($msg) {
    header("Location: db-error.php?msg=".$msg);
}

function getSiteName($pdo) {
    $sql = "select setting_value from site_settings where setting_name='Site Name'";
    $stmt = $pdo->query($sql);
    return $stmt->fetch();
}
?>