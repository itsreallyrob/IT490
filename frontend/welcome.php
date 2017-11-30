<?php
session_start();

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
 
				<?php echo "Hello " . $_SESSION["fname"] . " " . $_SESSION["lname"] . ".<br>"; ?>

				<br><br>
				<form action="index.php">
					<button type="signin" class="button">Sign Out</button>      <br><br><br>
				</form>

			</div>
		</div>
	</div>

</body>
</html>

