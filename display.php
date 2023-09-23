<?php
include ('./connect.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $mobile=$_POST['mobile'];
    $image=$_FILES['file'];
    // echo $username;
    // echo "<br>";
    // echo $mobile;
    // echo "<br>";
    // print_r($image);
    // echo "<br>";

    $imagefilename=$image['name'];
    // print_r($imagefilename);
    // echo "<br>";
    $imagefileerror=$image['error'];
    // print_r($imagefileerror);
    // echo "<br>";
    $imagefiletemp=$image['tmp_name'];
    // print_r($imagefiletemp);
    // echo "<br>";

    $filename_separate=explode('.',$imagefilename);
    // print_r($filename_separate);
    // echo "<br>";
    $file_extension=strtolower(end ($filename_separate));
    // print_r($file_extension);

    $extension=array('jpeg','jpg','png');
    if(in_array($file_extension,$extension)){
        $upload_image='images/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql="insert into `registration`(name,mobile,image) values('$username','$mobile','$upload_image')";
        $result=mysqli_query($conn,$sql);
        if(!$result){
          //   echo '<div class="alert alert-info" role="alert">
          //   <strong>Success</strong>Data inserted successfully!
          // </div>';
          die(mysqli_error($conn));
        }
       
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      img{
        width:200px;
      }
    </style>
</head>
    <h1 class="text-center my-4">User data</h1>
    <div class="container mt-5 d-flex justify-content-center">
    <table class="table table-bordered w-50">
  <thead class='table-dark'>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Username</th>
      <th scope="col">Image</th>
    </tr>
  </thead >
  <tbody>
   <?php
      $sql=" select * from `registration`";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $image=$row['image'];
        echo '<tr> 
        <td>'.$id.'</td>
        <td>'.$name.'</td>
        <td><img src='.$image.' /></td>
        </tr>';
      }
  
   ?>
</tbody>
</table>
    </div>
</body>
</html>