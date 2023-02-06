<?php
// connect to the database
$conn = mysqli_connect('localhost', 'anfal', 'root', 'success');

// Uploads files
print_r($_FILES);
if (isset($_FILES)) { // if save button on the form is clicked
    // name of the uploaded file

    $filename = $_FILES['myfile']['name'];
    echo "fileName: ".$filename."<br>";

    // destination of the file on the server
    $destination = 'var/www/html/phpProjectZip/' . $filename;
    echo "destination : ".$destination."<br>";
    echo getcwd()."<br>";
    echo realpath(dirname($filename))."<br>";
    echo __FILE__."<br>";
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    echo "extension : ". $extension ."<br>";
    // the physical file on a temporary uploads directory on the server
    // $file = $_FILES['myfile']['tmp_name'];

    $file = $_FILES['myfile']['name'];
    $size = $_FILES['myfile']['size'];
    echo $file;

if (!in_array($extension, ['zip'])) {
    echo "You file extension must be .zip";
    // check the size 
    // } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
    //     echo "File too large!";
    // }
}else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
              echo $filename;

            // $sql = "INSERT INTO `products`('id', `downloadLink`, `size`) VALUES (2,'$filename', '$size')";
           
           $sql ="INSERT INTO users(id, email, password) VALUES ('1','value-2@gmail.com','value-3')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}