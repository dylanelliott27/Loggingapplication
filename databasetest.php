<?php

if (file_exists('./.env.php')) {
    require_once('./.env.php');
  }


$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "./BaltimoreCyberTrustRoot.crt.pem", NULL, NULL) ;
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}



$snackonesql= "insert into Diabeteslogs (date, mealtype, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Snack 1', '{$_POST['snackcarbs']}', '{$_POST['snacktime']}', '{$_POST['snackinsulin']}', '{$_POST['snacksugars']}');";
$snackResult = mysqli_query($conn, $snackonesql);

if($snackResult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}






$lunch= "insert into Diabeteslogs (date, mealtype, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Lunch', '{$_POST['lunchcarbs']}', '{$_POST['lunchtime']}', '{$_POST['lunchinsulin']}', '{$_POST['lunchsugars']}');";

$lunchResult = mysqli_query($conn, $lunch);

if($lunchResult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}
 // what does this do




$snacktwo= "insert into Diabeteslogs (date, mealtype, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Snack 2', '{$_POST['snackcarbs2']}', '{$_POST['snacktime2']}', '{$_POST['snackinsulin2']}', '{$_POST['snacksugars2']}');";

$snacktwoResult= mysqli_query($conn, $snacktwo);

if($snacktwoResult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}






$dinner= "insert into Diabeteslogs (date, mealtype, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Dinner', '{$_POST['dinnercarbs']}', '{$_POST['dinnertime']}', '{$_POST['dinnerinsulin']}', '{$_POST['dinnersugars']}');";

$dinnerresult = mysqli_query($conn, $dinner);

if($dinnerresult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}







$snackthree= "insert into Diabeteslogs (date, mealtype, carbs, time, insulin, sugars) VALUES ('{$_POST['date']}', 'Snack 3', '{$_POST['snackcarbs3']}', '{$_POST['snacktime3']}', '{$_POST['snackinsulin3']}', '{$_POST['snacksugars3']}');";

$snackthreeresult = mysqli_query($conn, $snackthree);

if($snackthreeresult){
    echo "SUCCESS";
}
else{
    echo "ERROR";
}




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