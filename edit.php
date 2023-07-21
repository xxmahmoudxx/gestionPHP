

<html>
<body>

<form action="update.php" method="post">

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM article where id=".$_REQUEST["id"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
 $row = $result->fetch_assoc(); 
 echo "ID: <input type='text' name='id' value='". $row["id"]. "'><br>";

 echo "Name: <input type='text' name='name' value='". $row["name"]. "'><br>";
 echo "PRICE: <input type='text' name='price' value='". $row["price"]. "'><br>";
 echo "quantity: <input type='text' name='quantity' value='". $row["quantity"]. "'><br>";


} else {
  echo "0 results";
}
$conn->close();
?>


<input type="submit">
</form>

</body>
</html>