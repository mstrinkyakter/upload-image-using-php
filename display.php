<?php
include ('./connect.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $mobile=$_POST['mobile'];
    $image=$_FILES['file'];
    echo $username;
    echo "<br>";
    echo $mobile;
    echo "<br>";
    print_r($image);
    echo "<br>";

    $imagefilename=$image['name'];
    print_r($imagefilename);
    echo "<br>";
    $imagefileerror=$image['error'];
    print_r($imagefileerror);
    echo "<br>";
    $imagefiletemp=$image['tmp_name'];
    print_r($imagefiletemp);
    echo "<br>";

    $filename_separate=explode('.',$imagefilename);
    print_r($filename_separate);
    echo "<br>";
    $file_extension=strtolower(end ($filename_separate));
    print_r($file_extension);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>