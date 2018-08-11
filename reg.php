<body>
<div style = "background-color:none; color:#323232; font-size:28px; padding:7%;" align="center";><u><b>Register</b></u></div>
<form id='register' action='' method='post' 
    accept-charset='UTF-8'  enctype="multipart/form-data">
<fieldset >


<!--<legend>Register</legend>-->
<!--<div align="center" >-->
<input type='hidden' name='submitted' id='submitted' value='1' class = "box"/>
<div class="lol">
<label for='name' >Your Full Name*: </label>
<input type='text' name='name' id='name' maxlength="50" class = "box"/>
<br><br>
<label for='email' >Email Address*:</label>
<input type='text' name='email' id='email' maxlength="50" class = "box" />
<br><br>
<label for='username' >UserName*:</label>
<input type='text' name='username' id='username' maxlength="50" class = "box" />
<br><br>
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" class = "box" />
<br><br>
    <label>Select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
	<br>
	</div>
    <!-- <input type="submit" value="Upload Image" name="submit"> -->
	<input type='submit' name='Submit' value='Submit' align="center";/>
<!--</div>-->
</div>
</fieldset>
</form>




</body>

      <style type = "text/css">
	  
		 .lol{ padding-left: 440px; }
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:28px;
			
         }
         label {
            font-weight:bold;
            font-size:24px;
			color:Black;
		
         }
		
         .box {
            border:#666666 solid 1px;
		
         } 
		 
		 label { 
				margin: 0 auto; 
				width:300px;
				}
				
	
		 input[type=submit] { 
			
			color: Black;
			margin-top: 5px;
			margin-left: 600px;
			padding:5px 5px; 				
			font-size: 17px;
			// align: center;
			border-color: black;
			width:18ex;
			height:6ex;
			outline: none;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px; 
			background-color: #808080;
		 } 
body{
	background-image: url("tri.png");}
	
</style>



<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> 
</head>

<?php

// Check if image file is a actual image or fake image
// Check if file already exists
/* if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
} */
// Check file size
/* if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
} */
// Allow certain file formats
/* if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
} */
// Check if $uploadOk is set to 0 by an error
/* if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		echo "<img src='$target_file' hight='400' width='400'>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} */
?>
<?php

include('config.php');
//echo $db_host;




if(isset($_POST["Submit"])){
	try{				
	
		$nameErr = $emailErr = "";
		
		$name = $_POST['name'];
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
			{
				$nameErr = "Only letters and white space allowed"; 
				echo $nameErr;
			}
		$email = $_POST['email'];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{	
				$emailErr = "Invalid email format"; 
				echo $emailErr;
			}
		$username = $_POST['username'];
		$password = $_POST['password'];	
	
		// start file uploading			
		if(isset($_FILES['fileToUpload']['name'])){
			
			  $file_name = $_FILES['fileToUpload']['name'];
			  if(empty($file_name))
			  {		  
				$fileToUpload = ""; 
			  }
			  else
			  {
				$file_size =$_FILES['fileToUpload']['size'];
				$file_tmp =$_FILES['fileToUpload']['tmp_name'];
				$file_type=$_FILES['fileToUpload']['type'];
				$tmp = explode('.', $file_name);
				$file_ext = strtolower(end($tmp));
				$fileToUpload =  "uploads/".$file_name;
				 //base64_encode($file_name);
				  $expensions= array("jpeg","jpg","png","pdf");
				  if(in_array($file_ext,$expensions)=== false){
					 $errors[]="extension not allowed, please choose a JPEG or PNG or PDF file.";
				  }
				  
				  if($file_size > 2097152){
					 $errors[]='File size must be excately 2 MB';
				  }
				  
				  if(empty($errors)==true){			 
					 move_uploaded_file($file_tmp,$fileToUpload);
					 // echo "Success";
					 
				  }else{
					 print_r($errors);
				  }			
					
			  }
		}
	   else{
		   echo "image unset";
		   die;
	   } 
	   // end of uploading
	   
				if($nameErr=="" && $emailErr== "")
				{	
					$qry="INSERT INTO tbl_reg (fname, e_mail, uname, password,pic)
					VALUES ('$name', '$email', '$username','$password','$fileToUpload')";
					$result = mysqli_query($conn, $qry);
					if(!$result)
					{
						die('SQL ERROR'. mysqli_error($conn));
					}
					else {
						?>
						<p><center><?php echo "Inserted Sucessfully"; ?></center></p>
						<?php
						// echo "Inserted Sucessfully";
					}
				}
				else 
				{	echo "Please enter details again."; }
	}
	catch(Exception $e){
		
	}	
} 



?>