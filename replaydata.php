<?php
define('HOST','localhost');
define('USER','root');
define('PASS',"");
define('DB','problemsolver');

$con = mysqli_connect(HOST,USER,PASS,DB) or die('Connection Failed');

$server_key="AAAAEJZxCJ8:APA91bH9xyZis3mpv02q9U1WhEUES_k1LzdGUyGpd4i2EAUoRuNYelfEknHNywy5MESPvrq4fgLGmn9RkH6qUQJbXpktdq8XwH6PSJ0QdwDtDS1-nt3MSpOXU65OmX7X6RbBaMiLs9ri";
$path_to_fcm = 'https://fcm.googleapis.com/fcm/send';

$replay1=$_POST['replaydata'];
$email1=$_POST['Email'];
$fcm_token=$_POST["Fcm_token"];
$title='Solution';

$sql="insert into replay(replaydata,Email,fcm_token) values('$replay1','$email1','$fcm_token')";

 if(mysqli_query($con,$sql))
 {
  $a=array("Replay Posted");
   echo json_encode($a); 
  }
  else
{
      echo 'Replay Can not be Posted';
}
$sql_1 = "select fcm_token from replay where Email = '$email1' ";

$result = mysqli_query($con,$sql_1);
$row = mysqli_fetch_row($result);
$key = $row[0];

$headers = array(
						'Authorization:key=' .$server_key,
						'Content-Type:application/json'
				);

$abc = array('to'=>$key,'notification'=>array('title'=>$title,  'body'=>$replay1,'click_action'=>'Notification_action'));

$payload = json_encode($abc);

$curl_session  = curl_init();
curl_setopt($curl_session, CURLOPT_URL,$path_to_fcm );
curl_setopt($curl_session, CURLOPT_POST, true);
curl_setopt($curl_session, CURLOPT_HTTPHEADER,$headers );
curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true );
curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload );
$result = curl_exec($curl_session);
curl_close($curl_session);

  mysqli_close($con);
?>