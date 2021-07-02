<!DOCTYPE html>
<html>
    <head>
        <style>
        p{
            text-align: center;
            border-radius: 10px;
            background-color: #a2cdb8;
            padding: 10px;
            font-size: 20px;
        }
        table{
            font-size: 20px;
            text-align: center;
            width:100%;
            padding: 10px;
            border-style:solid;
        }
        td{
            border-style:solid;
        }
        h1{
            text-align: center;
            color: chocolate;
        }
        body{
            color:#44566c;
            background-color:#e7e7e7;
        }
        </style>
    </head>
<body>
        <h1> Compteurs et stock</h1>
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
$sql1 = "SELECT citerne1,citerne2,citerne3,citerne4,citernee1,dat FROM stock ";
$sql = "SELECT * FROM essence order by dat desc";

$result = $conn->query($sql1);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> <p>- citerne1: ". $row["citerne1"]. "  citerne2 :" . $row["citerne2"] ." citerne3 :".$row["citerne3"]." -citerne4 :".$row["citerne4"]." citerne5 :".$row["citernee1"]."    date: ".$row["dat"]."</p>
        <p>total gasoil :".$row["citerne1"]+$row["citerne2"]+$row["citerne3"]+$row["citerne4"]."</p>";
    }
} else {
    echo "0 results";
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<table><tr><td>compteur1:</td><td>compteur2:</td><td>compteur3:</td><td>compteur4:</td><td>compteur5</td><td>gain gasoil</td><td>compteur essence1</td><td>compteur2</td><td>gain essence</td><td>somme journaliere:</td><td>date:</td></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["c1"]. "</td><td>" . $row["c2"] ."</td><td>".$row["c3"]." </td><td>".$row["c4"]."</td><td>".$row["c5"]."</td><td>".$row["gaingasoil"]."</td><td>".$row["ce1"]."</td><td>".$row["ce2"]."</td><td>".$row["gainessence"]."</td><td>".$row["prix"]." </td><td>".$row["dat"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>