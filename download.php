<?php

// file will download ad this name
$demo_name = "my-image.zip";
header('Content-type: application/zip');  
header('Content-Disposition: attachment; filename="'.$demo_name.'"');  
// readfile($zip_file_name_with_location); // auto download
//if you wnat to delete this zip file after download
unlink($zip_file_name_with_location);


















// // Downloads files
// if (isset($_GET['file_id'])) {
//     $id = $_GET['file_id'];

//     // fetch file to download from database
//     $sql = "SELECT * FROM files WHERE id=$id";
//     $result = mysqli_query($conn, $sql);

//     $file = mysqli_fetch_assoc($result);
//     $filepath = 'uploads/' . $file['name'];

//     if (file_exists($filepath)) {
//         header('Content-Description: File Transfer');
//         header('Content-Type: application/octet-stream');
//         header('Content-Disposition: attachment; filename=' . basename($filepath));
//         header('Expires: 0');
//         header('Cache-Control: must-revalidate');
//         header('Pragma: public');
//         header('Content-Length: ' . filesize('uploads/' . $file['name']));
//         readfile('uploads/' . $file['name']);

//         // Now update downloads count
//         $newCount = $file['downloads'] + 1;
//         $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
//         mysqli_query($conn, $updateQuery);
//         exit;
//     }

// }