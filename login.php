<?php
   include("config.php");
   session_start();
    $error =" ";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = $_POST['username'];
      $password = $_POST['password']; 
      
      $sql = "SELECT * FROM tbl_reg WHERE uname = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);   
      $count = mysqli_num_rows($result);
      
      // If result matched $username and $password, table row must be 1 row
	
      if($count == 1) {
         /*session_register("username");
         $_SESSION['login_user'] = $username; */
		 if ($result->num_rows > 0) 
	{
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		
		{	// Set session variables
			$_SESSION["name"] = $row['fname'];
			$_SESSION["email"] = $row['e_mail'];
			$_SESSION["photo"] = $row['pic'];
			echo "Session variables are set.";
		}
	}
         
         header("location: welcome.php");
		 $error = " ";
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
   
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:28px;
			
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:24px;
         }
         .box {
            border:#666666 solid 1px;
         } 
		 input[type=submit] { 
			margin-top: 10px;
			padding:5px 15px; 				
			font-size: 17px;
			align: center;
			border-color: black;
			width:18ex;
			height:6ex;
			outline: none;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px; 
			background-color: #808080;
		 }
		 body {
		 background-image: url("tri.png"); }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
        <div style = "width:100%; height:100%; margin-top:132px; border: none; " align = "center">
            <div style = "background-color:none; color:#323232; padding:3px;"><u><b>Login</b></u></div>
				
            <div style = "margin: 80px;">
               
               <form action = "" method = "post">
                  <label>UserName  :  </label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :  </label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Login "/><br />
               </form>
               
               <div style = "font-size:14px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>