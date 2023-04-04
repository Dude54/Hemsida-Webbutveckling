<?php
// connect to the database
//TODO länka php dokument till databas
$host = "sql301.epizy.com";
$username = "epiz_33853636";
$password = "vpPDPeyS73i2JR";
$dbname = "epiz_33853636_hemsida";

$conn = mysqli_connect($host, $username, $password, $dbname);

// check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


// get user input
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// insert user input into the database
$sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

if (mysqli_query($conn, $sql)) {
	echo "Message sent successfully!";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
header('Location: Startsida.html');
?>
