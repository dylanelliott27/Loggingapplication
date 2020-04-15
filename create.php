<?php
    session_start();
    if(isset($_SESSION['creationresult'])){
        if($_SESSION['creationresult']){
            echo "<div class='alert alert-success text-center'>The record has been successfully submitted!</div>";
        }
        else{
            echo "<div class='alert alert-danger text-center'>Call dylan the program is broken</div>";
        }
    }
    unset($_SESSION['creationresult']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./style.css" rel="stylesheet" <?php echo rand();?>>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="d-flex justify-content-center mb-3">
    <a href="./index.php"><button class="btn btn-danger">Back to main menu</button></a>
</div>
<div class="formwrapper">
    <form class="form" action="./post.php" method="POST">
        <div class="d-flex justify-content-center">
            <div class="date mb-3">
               <label for="date">DATE:</label>
                <input required type="date" name="date">
            </div>
          
        </div>

        <div class="breakfast">
            <label class="text-center" for="breakfast">BREAKFAST</label>
            <label for="breakfast">Carbs</label>
            <input required name="breakfastcarbs"></input>
            <label for="breakfast">Time</label>
            <input required name="breakfasttime"></input>
            <label for="breakfast">Insulin</label>
            <input required name="breakfastinsulin"></input>
            <label for="breakfast">Sugars</label>
            <input required name="breakfastsugars"></input>
        </div>

        <div class="snackone">
        <label class="text-center" for="snack">SNACK 1</label>
        <label for="breakfast">Carbs</label>
            <input required  name="snackcarbs"></input>
            <label for="breakfast">Time</label>
            <input required name="snacktime"></input>
            <label for="breakfast">Insulin</label>
            <input required name="snackinsulin"></input>
            <label for="breakfast">Sugars</label>
            <input required name="snacksugars"></input>
        </div>

        <div class="lunch">
        <label class="text-center" for="lunch">LUNCH</label>
        <label for="breakfast">Carbs</label>
            <input required name="lunchcarbs"></input>
            <label for="breakfast">Time</label>
            <input required name="lunchtime"></input>
            <label for="breakfast">Insulin</label>
            <input required name="lunchinsulin"></input>
            <label for="breakfast">Sugars</label>
            <input required name="lunchsugars"></input>
        </div>

        <div class="snacktwo">
        <label class="text-center" for="snack2"> SNACK 2 </label>
        <label for="breakfast">Carbs</label>
            <input required name="snackcarbs2"></input>
            <label for="breakfast">Time</label>
            <input required name="snacktime2"></input>
            <label for="breakfast">Insulin</label>
            <input required name="snackinsulin2"></input>
            <label for="breakfast">Sugars</label>
            <input required name="snacksugars2"></input>
        </div>

        <div class="dinner">
        <label class="text-center"  for="dinner"> DINNER </label>
        <label for="breakfast">Carbs</label>
            <input required name="dinnercarbs"></input>
            <label for="breakfast">Time</label>
            <input required name="dinnertime"></input>
            <label for="breakfast">Insulin</label>
            <input required name="dinnerinsulin"></input>
            <label for="breakfast">Sugars</label>
            <input required name="dinnersugars"></input>
        </div>

        <div class="snackthree">
        <label class="text-center" for="snack3"> SNACK 3 </label>
        <label for="breakfast">Carbs</label>
            <input required name="snackcarbs3"></input>
            <label for="breakfast">Time</label>
            <input required name="snacktime3"></input>
            <label for="breakfast">Insulin</label>
            <input required name="snackinsulin3"></input>
            <label for="breakfast">Sugars</label>
            <input required name="snacksugars3"></input>
        </div>

        <button type="submit" class="btn btn-primary">SUBMIT</button>
    </form>
</div>

</body>
</html>