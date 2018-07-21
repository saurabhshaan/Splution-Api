<?php
define('HOST','localhost');
define('USER','root');
define('PASS',"");
define('DB','problemsolver');
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Connection Failed');
$user_name = $_POST["login_name"];
$user_email = $_POST["login_email"];
$user_pass = $_POST["login_password"];

 if (!empty($user_name)) {

$sql="select Name,Email,Password FROM executive where Name like '$user_name', Email like '$user_email' and Password like '$user_pass';";

$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_assoc($result);
	$name=$row["Name"];
	
	echo "Login.....success";

}
else
{
	echo"Login failed.... Check Username and Password";
}
}
else
{
echo"Please Fill Name and Password";
}

?>