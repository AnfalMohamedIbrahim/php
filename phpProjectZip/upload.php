<?php
// connect to the database
$conn = mysqli_connect('localhost', 'anfal', 'root', 'success');

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    print_r($_POST['save']);
    $filename = $_FILES['myfile']['name'];
     echo "fileName: ".$filename."<br>";
    // destination of the file on the server
    $destination = 'uploads/' . $filename;
     echo "destination : ".$destination."<br>";
     echo getcwd();
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    echo "extension : ". $extension ."<br>";
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
              echo $filename;
            // $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
        //     if (mysqli_query($conn, $sql)) {
        //         echo "File uploaded successfully";
        //     }
        // } else {
        //     echo "Failed to upload file.";
        }
    }
}