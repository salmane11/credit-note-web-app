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
    <h1>Partie fournisseur</h1>
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

$sql = "SELECT * FROM fournisseur";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo"<table><tr><td>numero de la facture</td><td>somme de la facture</td><td>date d'arrivée de la facture</td>
    <td>numero de cheque</td><td>somme de cheque</td><td>date de creation du cheque</td>
    <td>lcn</td><td>date de creation de l'lcn</td><td>vignette</td>
    <td> gasoil </td><td>essence</td><td>date de payement</td></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> ". $row["numerofacture"]. "</td>
        <td>". $row["somme de la facture"]. "</td><td>" . $row["date d'arrivée"] ."
        </td><td>".$row["numero de cheque"]."</td><td>".$row["somme cheque"]."
        </td><td>".$row["date de creation de cheque"]."</td><td>".$row["lcn"]."</td><td>".$row["date de création lcn"]."
        </td><td>".$row["vignette"]."</td><td>".$row["gasoil"]." litre</td><td>".$row["essence"]." litre </td><td>".$row["payé"]."</td></tr><";
    }
    echo"</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>