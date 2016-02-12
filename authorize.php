<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "funnyevent";
$id_get = $_GET['id'];

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Making a vulnerable query
$query = "SELECT * FROM Identifiers WHERE id=$id_get";
//echo $query;

// Chek for results using the previous vulnerable query
$result = $mysqli->query($query);
//echo "mysqli affected rows: $mysqli->affected_rows\n";

if ($result and ($mysqli->affected_rows > 0)) {
    //while ($row = $result->fetch_assoc()) {
    //    printf ("%s\n", $row["id"]);
    //}
    echo "<html><head><center><pre1>YOUR ACCESS IS GRANTED: Wellcome $id_get</pre1><center></html></head>
	  <body><center><img src='http://localhost/checkpass/img/grant.gif'/></center></body>";
} else {
    echo "<html><head><center><pre1>YOU WILL NOT PASS!!! $id_get</pre1><center></html></head>
	  <body><center><img src='http://localhost/checkpass/img/stop.gif'/></center></body>";;
}

$result->free();
$mysqli->close();
?>




