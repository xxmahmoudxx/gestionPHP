<!DOCTYPE html>
<html>
<head>
<style>

.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Gestion des articles</h1>


<a href="create.html" class="button">create</a>

<table>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>price</th>
    <th>quantity</th>
    <th>action</th>

  </tr>

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

$sql = "SELECT * FROM article";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td> " . $row["id"]. " </td>
    <td> " 
    . $row["name"]. " </td><td> " .$row["price"]. " </td>
    <td> " 
    .$row["quantity"]. " </td>
    <td>
    <a href='edit.php?id=". $row["id"]. "' class= 'button'style='background-color:blue;' >edit</a> 
    <a href=' delete.php?id=". $row["id"]. "' class='button'style='background-color:red';>delete</a>"
    ."</td></tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</table>

</body>
</html>