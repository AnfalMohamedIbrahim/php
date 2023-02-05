<?php
require_once("./vendor/autoload.php");
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;


$dowload = new download;
echo $dowload->generateRandomName()."<br>";
print_r($_GET);
// login 
// generate token and put it in the data base this will be the access code   
// and take it an put it in the url in the downloading page 



$data = 'localhost/phpProject';

// quick and simple:
echo '<img src="'.(new QRCode)->render($data).'" alt="QR Code" />'."<br>";

