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
		<div class="middle2">
			<div class="contentbody">

				<form method="POST" action="buttons.php">
					<br>
					<button type="signin" class="button2" name="selectb" value="home">Your Stocks</button>
					<button type="signin" class="button2" name="selectb" value="out">Sign Out</button>

				</form>
				
				</br></br>
 
				<?php echo "Your Stock is " . $_SESSION["stocksearch"] . ".<br>"; ?>

				<br><br>
				

			</div>
		</div>
	</div>

</body>
</html>

