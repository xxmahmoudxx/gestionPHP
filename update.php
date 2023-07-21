<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE article SET name='".$_POST["name"]."', price=".$_POST["price"].
" , quantity=".$_POST["quantity"]." WHERE id=".$_POST["id"];

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
  header('Location: index.php');
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>