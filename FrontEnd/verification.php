<?php


$hostname = "sql2.njit.edu";
$username = "rjc43";
$password = "pxNGdj5c";
try {
	    $conn = new PDO("mysql:host=$hostname;dbname=rjc43", $username, $password);


	    session_start();
  		$useremail = $_POST['email'];
  		$userpass = $_POST['password'];
  		$userfname = $_POST['fname'];
  		$userlname = $_POST['lname'];

  		$email = $_POST['email'];

  		$_SESSION['email'] = $_POST['email'];
  		$_SESSION['password'] = $_POST['password'];
  		$_SESSION['fname'] = $_POST['fname'];
  		$_SESSION['lname'] = $_POST['lname'];



		if($useremail == "" || $userpass == "" || $userfname == "" || $userlname == "")
  		{
  			$_SESSION['errorsession'] = "You did not fill everything out!";
  			$_SESSION['errorsent']=true;
  			header("Location: signup.php");
  			exit;
  		}
  		

  		$emailThere = false;

  				$result = $conn->prepare("SELECT id, fname, lname, password, email FROM stocklogin WHERE email = '$email' ");
				$result->execute();


		for($i=0; $row = $result->fetch(); $i++){


		  		if($_POST['email'] ==  $row['email'])
		  		{
					$emailThere = true;
		  		}
		  		else
		  		{
		  			$emailThere = false;
		  		}

		}




		if($emailThere == true)
		{
			$_SESSION['errorsession'] = "That email already exists!";
			$_SESSION['errorsent']=true;

			header("Location: signup.php");
	    	exit;
		}
		else
		{

			$highestid = 0;
			

			foreach ($conn->query("SELECT id FROM accounts") as $idlook)
			{
			   if($idlook["id"] > $highestid)
			   {
			   		$highestid = $idlook["id"];
			   }
			}



  			$nextid = $highestid+1;



			$sql = "INSERT INTO stocklogin (id, email, fname, lname, password) VALUES ($nextid, '$useremail', '$userfname', '$userlname', '$userpass')";
		    

		    $conn->exec($sql);

		    header("Location: mystocks.php");
	    	exit;

		}
		

		




    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage() + "</br>";
    }


$conn = null;

?>