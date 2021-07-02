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
    button{
            text-decoration:none;
            border-radius: 15px;
            color:brown;
            padding: 10px 10px;
    }
    td{
        border-style:solid;
    }
    body{
        text-align: center;
        color:#44566c;
        background-color:#e7e7e7;
        }
        .left{
            position:absolute;
            left:0;
        }
        .right{
            position:absolute;
            right:0;
        }
    
    </style>
</head>
<body>
    <h1>ma caisse</h1>
    <button class="left"><a href="http://localhost/ajouter%20caisse.php">ajouter a la caisse</a></button>
    <button class="right"><a href="http://localhost/retirer.php">retirer de la caisse</a></button><br><br>
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

$sql = "SELECT * FROM caisse where id>0";
$cash= "SELECT * FROM caisse where id=0";
$result = $conn->query($sql);
$result2 = $conn->query($cash);
//pour afficher le cash qui se trouve dans la caisse.
if ($result2->num_rows > 0) {
    while($row1 = $result2->fetch_assoc()) {
        echo "<h2>cash:".$row1["cash"]."</h2>";
    }
} else {
    echo "0 results";
}
//pour afficher ce que se trouve dans la caisse.
if ($result->num_rows > 0) {
    echo"<br><br><table><tr><td>id</td><td>numero de cheque</td><td>somme de cheque</td>
    <td>lcn</td><td>somme lcn</td><td>vignette</td>
    <td> somme vignette</td></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["numero cheque"]."</td><td>".$row["somme cheque"]."</td>
        <td>".$row["lcn"]."</td><td>".$row["somme lcn"]."</td>
        <td>".$row["vignette"]."</td><td>".$row["somme vignette"]."</td></tr>";
    }
    echo"</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>