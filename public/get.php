<?php
header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Headers: http://localhost:3000');
header('Access-Control-Allow-Methods: *');
if (file_exists('./.env.php')) {
    require_once('./.env.php');
}
$host = getenv('DB_SERVERNAME');
$username = getenv('DB_UID');
$password = getenv('DB_PASS');
$db_name = getenv('DB_DB');


$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "./BaltimoreCyberTrustRoot.crt.pem", NULL, NULL) ;
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
    echo json_encode(mysqli_connect_error());
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$requestedRow = mysqli_query($conn, "SELECT * from Diabeteslogs where date = '{$_GET['date']}';");
$dataRows = mysqli_fetch_all($requestedRow, MYSQLI_ASSOC);

echo json_encode($dataRows);
mysqli_close($conn);
exit;

?>