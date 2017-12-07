<?php
session_start();

if ($_POST['selectb'] == 'out') 
{
    header("Location: index.php");
} 
else if ($_POST['selectb'] == 'top') 
{
	$_SESSION['stocksearch'] = $_POST['stocksearch'];
    header("Location: topstocks.php");
} 
else if ($_POST['selectb'] == 'home') 
{
    header("Location: mystocks.php");
} 
else if ($_POST['selectb'] == 'test') 
{

	

    	echo "works here1";

	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');

	//include 'path.inc';
	//include 'get_host_info.inc';
	//include 'rabbitMQLib.inc';

	echo "works here2";

	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	if (isset($argv[1]))
	{
	  $msg = $argv[1];
	}
	else
	{
	  $msg = "test message";
	}

	echo "works here3 AND " . $msg;


	$request = array();
	$request['type'] = "Login";
	$request['username'] = "Rob";
	$request['password'] = "Worked From Website";
	//$request['message'] = $msg;
	$response = $client->send_request($request);
	//$client->send_request($request);
	//send_request($request);
	
	//$response = $client->publish($request);

	echo "works here4";


	echo "client received response: ".PHP_EOL;
	//print_r($response);
	echo "\n\n";

	echo $argv[0]." END".PHP_EOL;
	
	//header("Location: topstocks.php");




}

	

?>
