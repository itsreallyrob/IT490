<?php


$hostname = "sql2.njit.edu";
$username = "rjc43";
$password = "pxNGdj5c";
try {
	    $conn = new PDO("mysql:host=$hostname;dbname=rjc43", $username, $password);


	    session_start();
  		$useremail = $_POST['email'];
  		$userpass = $_POST['password'];
  		$email = $_POST['email'];
  		$_SESSION['email'] = $_POST['email'];;


		if($useremail == "")
  		{
  			$_SESSION['errorsession'] = "You did not enter an email!";
  			$_SESSION['errorsent']=true;
  			header("Location: index.php");
  			exit;
  		}
  		if($userpass == "")
  		{
  			$_SESSION['errorsession'] = "You did not enter a password!";
  			$_SESSION['errorsent']=true;
  			header("Location: index.php");
  			exit;
  		}
  		



  		$emailThere = false;
  		$passwordThere = false;

  				$result = $conn->prepare("SELECT id, fname, lname, password, email FROM stocklogin WHERE email = '$email' ");
				$result->execute();


		for($i=0; $row = $result->fetch(); $i++){
		  		$_SESSION['id'] = $row['id'];
		  		$_SESSION['fname'] = $row['fname'];
		  		$_SESSION['lname'] = $row['lname'];
		  		$_SESSION['password'] = $row['password'];
		  		$_SESSION['email'] = $row['email'];

		  		if($_POST['email'] ==  $row['email'])
		  		{
					$emailThere = true;
		  		}
		  		else
		  		{
		  			$emailThere = false;
		  		}

		  		if($_POST['password'] ==  $row['password'])
		  		{
					$passwordThere = true;
		  		}
		  		else
		  		{
		  			$passwordThere = false;
		  		}
		}










		if ($useremail == $_SESSION['email'] && $userpass == $_SESSION['password'])
		{
		    header("Location: mystocks.php");

		    exit;
		}
		else
		{

			if($emailThere == false)
			{
				$_SESSION['errorsession'] = "Email did not match!";
  				$_SESSION['errorsent']=true;
			}
			else if($passwordThere == false)
			{
				$_SESSION['errorsession'] = "Password did not match!";
  				$_SESSION['errorsent']=true;
			}

			header("Location: index.php");
		    exit;

		}



    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage() + "</br>";
    }


$conn = null;

?>