<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
		$image= addslashes($_FILES['image']['tmp_name']);
		$name= addslashes($_FILES['image']['name']);
		$image= file_get_contents($image);
		$image= base64_encode($image);
		saveimage($name, $image);
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
function saveimage()
{
	$con=$mysql_connect("localhost", "root", "");
	mysql_select_db("reg",$con);
	$qry="insert into images (name, image) values ('$name', '$image')";
	$result=mysql_query($qry, $con);
	if($result)
	{ echo "<br/> Image uploaded.";}
	else
	{ echo "<br/> Image not uploaded."; }

}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		echo "<img src='$target_file' hight='400' width='400'>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>