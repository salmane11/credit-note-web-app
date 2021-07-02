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
<h1> Historique d'operations</h1>
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

$sql = "SELECT nom, prenom,montant,operation,marchandise,mode,dat FROM historique order by nom ";
$result = $conn->query($sql);
echo "<table><tr><td> nom-prenom: </td><td>  montant: </td><td> operation:  </td><td> marchandise:</td><td>mode de payement:</td><td> date:  </td></tr>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> ". $row["nom"]. " " . $row["prenom"] ."</td><td> ".$row["montant"]."</td><td>".$row["operation"]."</td><td>".$row["marchandise"]."</td><td>".$row["mode"]."</td><td>".$row["dat"]."</td></tr>";
    }
    echo"</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>