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
					  
					<input class="inputsignup"  type="text" name="stocksearch" id="stocksearch" >                       <button type="signin" class="button2" name="selectb" value="top">Search Stocks</button> 
					


					&nbsp&nbsp&nbsp&nbsp&nbsp		<button type="signin" class="button2" name="selectb" value="out">Sign Out</button>    
				</form>
				
				</br></br>
 
				<?php echo "Hello " . $_SESSION["fname"] . " " . $_SESSION["lname"] . ".<br>"; ?>

				<br><br>
				

			</div>
		</div>
	</div>

</body>
</html>

