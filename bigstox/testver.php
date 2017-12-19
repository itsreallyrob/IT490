<?php
session_start();

	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');

  $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
  $request = array();
  $request['type'] = "Online test";
  $request['username'] = $_SESSION['email'];
  $request['password'] = $_SESSION['password'];
  //$request['message'] = $msg;
   $response = $client->send_request($request);
  //$response = $client->publish($request);

	header("Location: topstocks.php");
        exit;


?>
