<form id='register' action='' method='post' 
    accept-charset='UTF-8'>
<fieldset >
<legend>Log In</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>

<label for='username' >UserName*:</label>
<input type='text' name='username' id='username' maxlength="50" />

<label for='password' >Password*:</label>
<input type='text' name='password' id='password' maxlength="50" />
<input type='submit' name='Submit' value='Log in' />

</fieldset>
</form>

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

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO tbl_reg (fname, e_mail, uname, password)
VALUES ('$name', '$email', '$username','$password')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


/* $sql = "SELECT * FROM tbl_reg";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. "<br> - Name: " . $row["fname"]. "<br> Email-" . $row["e_mail"]. "<br>";
    }
} else {
    echo "0 results";
} */

$conn->close();


?>