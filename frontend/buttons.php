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
else 
{
    
}

	

?>