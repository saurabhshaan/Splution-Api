<?php
	define('HOST','localhost');
	define('USER','root');
	define('PASS','');	
	define('DB','problemsolver');	
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

	$email1=$_POST['Email'];
	//$email1="veer@g.n";

$sql="select * from replay where Email='$email1'" ;
$result=mysqli_query($con,$sql);

$response=array();
while($row=mysqli_fetch_array($result))
{
array_push($response,array(

"replaydata"=>$row["replaydata"],
"Email"=>$row["Email"]
));
}

 echo json_encode($response);


?>
