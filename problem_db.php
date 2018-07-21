<?php
define('HOST','localhost');
define('USER','root');
define('PASS',"");
define('DB','problemsolver');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Connection Failed');
 
$name1=$_POST['Name'];
$email1=$_POST['Email'];
$mobile1=$_POST['Mobile'];
$query1=$_POST['Query'];
$image1=$_POST['Image'];
$fcm_token=$_POST[fcm_token];

$decodedImage=base64_decode("$image1");
file_put_contents("image/".$mobile1,$decodedImage);

$imagePath=("http://172.28.172.2/problemsolver/image".$mobile1);

$sql="insert into querie(Name,Email,Mobile,Query,Image,Fcm_token) values
('$name1','$email1','$mobile1','$query1','$imagePath','$fcm_token')";

 if(mysqli_query($con,$sql))
 {
  $a=array("Login Success...Welcome");
   echo json_encode($a);
 }else{
      echo 'Registrationfailure';
}
  mysqli_close($con);
 ?>
