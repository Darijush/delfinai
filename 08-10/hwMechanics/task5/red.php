<?php

if(isset($_GET['ToBlue'])){
    header("Location: http://localhost/delfinai/08-10/hwMechanics/task5/blue.php"); 
    die;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: red">
    <a href="http://localhost/delfinai/08-10/hwMechanics/task5/red.php?ToBlue=1" >Maybe to blue?</a>
    
</body>
</html>