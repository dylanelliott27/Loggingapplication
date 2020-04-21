<?php
if (file_exists('./.env.php')) {
    require_once('./.env.php');
}
header('Access-Control-Allow-Origin: *'); 
$host = getenv('DB_SERVERNAME');
$username = getenv('DB_UID');
$password = getenv('DB_PASS');
$db_name = getenv('DB_DB');


$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "./BaltimoreCyberTrustRoot.crt.pem", NULL, NULL) ;
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);

if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

//----------------------QUERY ONE --------------------------

$breakfastsql= "insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Breakfast', '{$_POST['breakfastfood']}', '{$_POST['breakfastcarbs']}', '{$_POST['breakfasttime']}', '{$_POST['breakfastinsulin']}', '{$_POST['breakfastsugars']}');";
$breakfastResult = mysqli_query($conn, $breakfastsql);

if($breakfastResult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}

//----------------------QUERY TWO --------------------------

$snackonesql= "insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Snack 1', '{$_POST['snackfood']}', '{$_POST['snackcarbs']}', '{$_POST['snacktime']}', '{$_POST['snackinsulin']}', '{$_POST['snacksugars']}');";
$snackResult = mysqli_query($conn, $snackonesql);

if($snackResult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}

//----------------------QUERY THREE --------------------------

$lunch= "insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Lunch', '{$_POST['lunchfood']}', '{$_POST['lunchcarbs']}', '{$_POST['lunchtime']}', '{$_POST['lunchinsulin']}', '{$_POST['lunchsugars']}');";

$lunchResult = mysqli_query($conn, $lunch);

if($lunchResult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}


//----------------------QUERY FOUR --------------------------


$snacktwo= "insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Snack 2', '{$_POST['snackfood2']}', {$_POST['snackcarbs2']}', '{$_POST['snacktime2']}', '{$_POST['snackinsulin2']}', '{$_POST['snacksugars2']}');";

$snacktwoResult= mysqli_query($conn, $snacktwo);

if($snacktwoResult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}


//----------------------QUERY FIVE --------------------------


$dinner= "insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Dinner', '{$_POST['dinnerfood']}', '{$_POST['dinnercarbs']}', '{$_POST['dinnertime']}', '{$_POST['dinnerinsulin']}', '{$_POST['dinnersugars']}');";

$dinnerresult = mysqli_query($conn, $dinner);

if($dinnerresult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}





//----------------------QUERY SIX --------------------------

$snackthree= "insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Snack 3', '{$_POST['snackfood3']}', '{$_POST['snackcarbs3']}', '{$_POST['snacktime3']}', '{$_POST['snackinsulin3']}', '{$_POST['snacksugars3']}');";

$snackthreeresult = mysqli_query($conn, $snackthree);

if($snackthreeresult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}

//----------------------IF ALL QUERIES RETURN TRUE..... success & back to create --------------------------

if($snackthreeresult && $dinnerresult && $snacktwoResult && $lunchResult 
    && $snackResult && $breakfastResult){
        //session_start();
        //$_SESSION['creationresult'] = true;
        //header('Location: ./create.php');
        echo "SUCCESS ON ALL RECORDS";
        exit;
    }
    else{
        //session_start();
        //$_SESSION['creationresult'] = false;
        //header('Location: ./create.php');
        echo "FAILURE SUBMITTING ONE OR MORE";
        exit;
    }

exit;