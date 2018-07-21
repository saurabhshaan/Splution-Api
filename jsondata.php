<?php
	define('HOST','localhost');
	define('USER','root');
	define('PASS','');	
	define('DB','problemsolver');	
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
$sql="select * from querie";
$result=mysqli_query($con,$sql);

$response=array();
while($row=mysqli_fetch_array($result))
{
array_push($response,array(

"Name"=>$row["Name"],
"Email"=>$row["Email"],
"Mobile"=>$row["Mobile"],
"Query"=>$row["Query"],
"Image"=>$row["Image"],
"Fcm_token"=>$row["Fcm_token"]
));
}

 echo json_encode($response);


?>
