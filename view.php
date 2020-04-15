<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="d-flex justify-content-center flex-column align-items-center">
        <h1 class="mb-5"> Please choose a date from which you'd like to retrieve </h1>
        <form action="get.php" method="POST">
        <input name ="date" type="date" id="birthdaytime" name="birthdaytime">
        <button type="submit" class="btn btn-primary">FIND!</button>
        </form>
        <a href="./index.php"><button class="btn btn-danger mt-5">BACK to main menu</button></a>
    </div>
    </div>
</body>
</html>