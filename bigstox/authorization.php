<?php


// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$request->enable_super_globals();

if (!isset($_POST))
{
	$msg = "No Post info";
	echo json_encode($msg);
	exit(0);
}
$request = $_POST;
$response = "unsupported request type";

function sendtoServer($type,$email,$password)
{
	$file = __FILE__.PHP_EOL;
	$PathArray = explode("/",$file);
  $client = new rabbitMQClient("authClient.ini","testServer");
	//$client = SendToConsumer("testRabbitMQ.ini", "testBackup.ini", "testServer");
  $request = array();
  $request['type'] = $type;
  $request['email'] = $email;
  $request['password'] = $password;
  $response = $client->send_request($request);

	//LogMsg("Front-End has received response for login: ".$response, $PathArray[4], 'afv4', 'DevFront');
  return $response;
}

function registertoServer($type,$email,$password,$lname,$fname)
{
	$file = __FILE__.PHP_EOL;
	$PathArray = explode("/",$file);
  $client = new rabbitMQClient("authClient.ini","testServer");
	//$client = SendToConsumer("testRabbitMQ.ini", "testBackup.ini", "testServer");
  $request = array();
  $request['type'] = $type;
  $request['email'] = $email;
  $request['password'] = $password;
	$request['fname']=$fname;
	$request['lname'] = $lname;
  $response = $client->send_request($request);

  //LogMsg("Front-End has received response for registration: ".$response, $PathArray[4], 'afv4', 'DevFront');
  return $response;
}

switch ($request["type"])
{
	case "login":
		$response = sendtoServer($request['type'],$request['email'],$request['pword']);
		break;
	case "register":
		$response = registertoServer($request["type"],$request['email'],$request['password'],$request['fname'],$request['lname']);
		
		break;
}

session_start();





$_SESSION['email'] = $request['email'];
$_SESSION['password'] = $request['password'];

$email = $_SESSION['email'];



if($response){
	
	header("Location: mystocks.php");
exit;
}
else{
	
	 $_SESSION['errorsession'] = "Error Logging In!";
  			$_SESSION['errorsent']=true;
        header("Location: index.php");
exit;
}
exit(0);
?>

