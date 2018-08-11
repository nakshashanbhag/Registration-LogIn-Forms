<?php
//include('session.php');
?> 
<html>
   
   <head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> 
   <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome Admin !</h1> 
	  
	  <?php 
	  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	  $sql = "SELECT * FROM tbl_reg";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	 ?>
		<div class="container">
		<div class="row">
		<div class= " col-sm-3 ">
		 <?php echo "id"; ?>
		 </div>
		<div class= " col-sm-3 ">
		 <?php echo "Name"; ?>
		 </div>
		<div class= " col-sm-3 ">
		 <?php echo "Email";?>
		</div>
		 <div class= " col-sm-3 ">
		 <?php echo "Pic";?>
		 <br>
		 </div>
		</div>
		</div>	<?php
    while($row = $result->fetch_assoc()) {
		?>
		<div class="container">
		<div class="row">
		<div class= " col-sm-3 ">
		 <?php echo  $row["id"]; ?>
		 </div>
		<div class= " col-sm-3 ">
		 <?php echo  $row["fname"]; ?>
		 </div>
		<div class= " col-sm-3 ">
		 <?php echo  $row["e_mail"];?>
		 </div>
		 <div class= " col-sm-3 ">
		 <?php echo '<img height = "100" width="100" src="'.$row["pic"].'">'; ?>
		 </div>
		</div>
		</div>		
		<?php
        //echo "id: " . $row["id"]. "<br> - Name: " . $row["fname"]. "<br> Email-" . $row["e_mail"]. "<br> <br>";
    }
} else {
    echo "0 results";
} ?>
	  
	  
      <h2><a href = "admin_logout.php">Sign Out</a></h2>
   </body>
   
</html>