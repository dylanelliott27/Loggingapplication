<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php
if (file_exists('./.env.php')) {
    require_once('./.env.php');
  }
  /*

$serverName = getenv('DB_SERVERNAME'); // update me
$connectionOptions = array(
    "Database" => getenv('DB_DB'), // update me
    "Uid" => getenv('DB_UID'), // update me
    "PWD" => getenv('DB_PASS') // update me
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
$tsql= "SELECT * from Diabeteslogs where date = '{$_POST['date']}';";
$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE){
    echo 'ERROR';
    echo (sqlsrv_errors());
}
echo '<a href="./index.php"><button class="btn btn-danger">Back to menu</button></a>';
echo '<table class="table table-striped text-center">';
echo '<tr>';
echo '<th>Date</th>';
echo '<th>Meal-type</th>';
echo '<th>Carbs</th>';
echo '<th>Time</th>';
echo '<th>Insulin</th>';
echo '<th>Sugars</th>';
echo '</tr>';
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    $Date = $row['date']->format('d/m/Y');
    //var_dump($row);
    echo '<tr>';
    echo "<td>{$Date}</td>";
    echo "<td>{$row['mealtype']}</td>";
    echo "<td>{$row['carbs']}</td>";
    echo "<td>{$row['time']}</td>";
    echo "<td>{$row['insulin']}</td>";
    echo "<td>{$row['sugars']}</td>";
    echo "</tr>";
}
echo '</table>';
sqlsrv_free_stmt($getResults);
*/


$host = getenv('DB_SERVERNAME');
$username = getenv('DB_UID');
$password = getenv('DB_PASS');
$db_name = getenv('DB_DB');

//Establishes the connection
$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "./BaltimoreCyberTrustRoot.crt.pem", NULL, NULL) ;
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$requestedRow = mysqli_query($conn, "SELECT * from Diabeteslogs where date = '{$_POST['date']}';");
$dataRows = mysqli_fetch_all($requestedRow, MYSQLI_ASSOC);

echo '<table class="table table-striped text-center">';
echo '<tr>';
echo '<th>Date</th>';
echo '<th>Meal-type</th>';
echo '<th>Carbs</th>';
echo '<th>Time</th>';
echo '<th>Insulin</th>';
echo '<th>Sugars</th>';
echo '</tr>';

    foreach($dataRows as $row){
    
    echo '<tr>';
    echo "<td>{$row['date']}</td>";
    echo "<td>{$row['mealtype']}</td>";
    echo "<td>{$row['carbs']}</td>";
    echo "<td>{$row['time']}</td>";
    echo "<td>{$row['insulin']}</td>";
    echo "<td>{$row['sugars']}</td>";
    echo "</tr>";
    }
echo '</table>';

//Close the connection
mysqli_close($conn);
?>