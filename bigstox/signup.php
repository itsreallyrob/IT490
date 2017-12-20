
<?php
session_start();

if($_SESSION['errorsent']== true)
{

	$_SESSION['errorsent']=false;
}
else
{
	$_SESSION['errorsession'] = "";
	$_SESSION['errorsent']=false;
	$_SESSION['email'] = "";
	$_SESSION['password'] = "";
	$_SESSION['fname'] = "";
	$_SESSION['lname'] = "";

}


?>



<!doctype html>
<html>
<head>
	<title>Big Stox</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>



<body>
	
	<div class="content">
		<div class="top_block top_side">
			<div class="content" >


				<P class="titlep">Big Stox</P>

			</div>
		</div>
		<div class="background middle">
		</div>
		<div class="middle">
			<div class="contentbody">

				</br></br>

				<form method="POST" action="authorization.php">
					<div class="inputs">
						First Name: <input class="inputsignup" type="text" name="fname" value="<?php echo $_SESSION['fname'];?>"><br>
						Last Name: <input class="inputsignup"  type="text" name="lname" value="<?php echo $_SESSION['lname'];?>"><br>
						E-Mail: <input class="inputsignup"  type="text" name="email" value="<?php echo $_SESSION['email'];?>"><br>
						Password: <input class="inputsignup"  type="text" name="password" value="<?php echo $_SESSION['password'];?>"><br>
					</div>


					<button type="signup" class="button" name="type" value="register" >Sign Up</button>     


				</form>
				<br>
				<form action="index.php">
					<button type="signin" class="button">Log in Page</button>      <br><br><br>
				</form>

				<?php
					echo $_SESSION['errorsession'];

				?>



			</div>
		</div>
	</div>

</body>
</html>

