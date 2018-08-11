<?php
session_start();
print_r($_SESSION);

if(empty($_SESSION))
	
	{ 
	  
		header("Location: logout.php");
     
	}
?>
<html>
   <style>
   	 body {
		 background-image: url("laa.png");
		background-size: cover;
		//background-size: 8000px 4000px;
		background-repeat: no-repeat;
     }
	  a{color: white;
	  font-size: 30px;
	  font-style: italic;
	  text-align: center;
	  }
	 h1{color: white;
		text-align: center;
		margin-top: 20%;
		font-style: italic;
		font-size: 50px;
		font-family: "Bradley Hand", Helvetica, sans-serif; }

	
	 
      </style>
   <head>
      <title>Welcome </title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> 
   </head>
   
   <header>   <a href = "logout.php">Sign Out</a> </header>
   
   <body>
		<h4>
		Welcome
		<?php
			echo  $_SESSION["name"]; 
		?>
		</h4>
		<?php
		echo "Your email id is: " . $_SESSION["email"] . ".<br>";
		echo '<img height = "100" width="100" src="' .$_SESSION["photo"].'">';
	  ?>
	    
   </body>
   
</html>








