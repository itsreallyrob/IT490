<?php


$hostname = "localhost";
$username = "root";
$password = "Password00";
$dbname1 = "rjc43";
try {
	    //$conn = new PDO("mysql:host=$hostname;dbname=rjc43", $username, $password);
	    $conn = new mysqli($hostname, $username, $password, $dbname1);


	    session_start();
  		$useremail = $_POST['email'];
  		$userpass = $_POST['password'];
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['errorsession'] = "";
      $_SESSION['errorsent']=false;

  		
  		echo $useremail . " " . $userpass . "</br>";

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
  		

  		$sql = "SELECT id, fname, lname, email, password FROM stocklogin WHERE email = '$useremail' AND password ='$userpass'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {

		      $_SESSION['id'] = $row['id'];
		  		$_SESSION['fname'] = $row['fname'];
		  		$_SESSION['lname'] = $row['lname'];
		  		$_SESSION['password'] = $row['password'];
		  		$_SESSION['email'] = $row['email'];

          echo $_SESSION['id'] . "</br>";
          echo $_SESSION['fname'] . "</br>";
          echo $_SESSION['lname'] . "</br>";
          echo $_SESSION['password'] . "</br>";
          echo $_SESSION['email'] . "</br>";
          header("Location: mystocks.php");
        exit;
		  		
		    }
		} 
		else 
		{
		    $_SESSION['errorsession'] = "Incorrect Information!";
  			$_SESSION['errorsent']=true;
        echo $_SESSION['errorsession'] . "</br>";
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
