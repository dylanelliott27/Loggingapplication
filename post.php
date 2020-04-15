<?php
  if (file_exists('./.env.php')) {
    require_once('./.env.php');
  }
var_dump($_POST);
$serverName = getenv('DB_SERVERNAME'); // update me
$connectionOptions = array(
    "Database" => getenv('DB_DB'), // update me
    "Uid" => getenv('DB_UID'), // update me
    "PWD" => getenv('DB_PASS') // update me
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
$tsql= "insert into [dbo].[Diabeteslogs] (date, mealtype, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Breakfast', '{$_POST['breakfastcarbs']}', '{$_POST['breakfasttime']}', '{$_POST['breakfastinsulin']}', '{$_POST['breakfastsugars']}');";
$getResults= sqlsrv_query($conn, $tsql);

if($getResults){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}

sqlsrv_free_stmt($getResults); // what does this do



$snackonesql= "insert into [dbo].[Diabeteslogs] (date, mealtype, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Snack 1', '{$_POST['snackcarbs']}', '{$_POST['snacktime']}', '{$_POST['snackinsulin']}', '{$_POST['snacksugars']}');";

$snackResult= sqlsrv_query($conn, $snackonesql);

if($snackResult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}

sqlsrv_free_stmt($snackResult); // what does this do





$lunch= "insert into [dbo].[Diabeteslogs] (date, mealtype, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Lunch', '{$_POST['lunchcarbs']}', '{$_POST['lunchtime']}', '{$_POST['lunchinsulin']}', '{$_POST['lunchsugars']}');";

$lunchResult= sqlsrv_query($conn, $lunch);

if($lunchResult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}

sqlsrv_free_stmt($lunchResult); // what does this do




$snacktwo= "insert into [dbo].[Diabeteslogs] (date, mealtype, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Snack 2', '{$_POST['snackcarbs2']}', '{$_POST['snacktime2']}', '{$_POST['snackinsulin2']}', '{$_POST['snacksugars2']}');";

$snacktwoResult= sqlsrv_query($conn, $snacktwo);

if($snacktwoResult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}

sqlsrv_free_stmt($snacktwoResult);




$dinner= "insert into [dbo].[Diabeteslogs] (date, mealtype, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Dinner', '{$_POST['dinnercarbs']}', '{$_POST['dinnertime']}', '{$_POST['dinnerinsulin']}', '{$_POST['dinnersugars']}');";

$dinnerresult= sqlsrv_query($conn, $dinner);

if($dinnerresult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}

sqlsrv_free_stmt($dinnerresult);





$snackthree= "insert into [dbo].[Diabeteslogs] (date, mealtype, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Snack 3', '{$_POST['snackcarbs3']}', '{$_POST['snacktime3']}', '{$_POST['snackinsulin3']}', '{$_POST['snacksugars3']}');";

$snackthreeresult= sqlsrv_query($conn, $snackthree);

if($snackthreeresult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}

sqlsrv_free_stmt($snackthreeresult);


if($snackthreeresult && $dinnerresult && $snacktwoResult && $lunchResult 
    && $snackResult && $getResults){
        session_start();
        $_SESSION['creationresult'] = true;
        header('Location: ./create.php');
        exit;
    }
    else{
        session_start();
        $_SESSION['creationresult'] = false;
        header('Location: ./create.php');
        exit;
    }