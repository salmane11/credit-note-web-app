<!DOCTYPE html>
<html>
<head>
    <style>
    p{
        border-radius: 10px;
        background-color: #a2cdb8;
        padding: 10px;
        font-size: 20px;
    }
    table{
        font-size: 20px;
        width:100%;
        padding: 10px;
        border-style:solid;
    }
    td{
        border-style:solid;
    }
    body{
        text-align: center;
        color:#44566c;
        background-color:#e7e7e7;
        }
    </style>
</head>
<body>
    <h1>Mon Carnet</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "credit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nom, prenom,credit FROM client order by nom";
$sql1="SELECT sum(credit) as creance from client";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo "<p>la somme totale des creances est :  ". $row["creance"]. "</p> ";
    }
} else {
    echo "0 results";
}
echo "<table><tr><td> id: </td><td>  nom - prenom: </td><td> credit:  </td></tr>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["id"]. "</td><td> ". $row["nom"]. " " . $row["prenom"] ."</td><td> ".$row["credit"]."</td></tr>";
    }
    echo"</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>