<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
</head>
<body>
    <h1 align="center">This is a downloading Page </h1>
    <h1 align="center"><a  href="<?php
    echo isset($_GET["access"])?$_GET["access"]:"notFoundPage.php"?>">Download here</a></h1>
</body>
</html>