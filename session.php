<?php 
	include('config.php');
	session_start();
?>

<?php
// Set session variables
$_SESSION["name"] = $row["fname"];
$_SESSION["email"] = $row["e_mail"];
$_SESSION["photo"] = $row["fname"];
echo "Session variables are set.";
?>











/* <?php 
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?> */