<?php
define('HOST','localhost');
define('USER','root');
define('PASS',"");
define('DB','problemsolver');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Connection Failed');
 
$name1=$_POST['Name'];
$mobile1=$_POST['Mobile'];
$email1=$_POST['Email'];
$pass1=$_POST['Password'];
$image1=$_POST['Image'];

$decodedImage=base64_decode("$image1");
file_put_contents("image/".$email1,$decodedImage);

$imagePath=("http://192.168.43.147/problemsolver/executiveimage".$email1);


$sql="insert into executive(Name,Mobile,Email,Password,Image) values
('$name1','$mobile1','$email1','$pass1','$imagePath')";

 if(mysqli_query($con,$sql))
 {
  $a=array("Login Success...Welcome");
   echo json_encode($a);
    
  }

  else
{
      echo 'Registrationfailure';
}
  mysqli_close($con);

 ?>