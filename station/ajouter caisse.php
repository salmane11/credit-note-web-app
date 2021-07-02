<!DOCTYPE html>
<html>
    <head>
        <title>
            caisse
        </title>
        <style>
        body{
            text-align: center;
            font-family:cursive;
            font-size: 20px;
            color:#44566c;
            background-color:#e7e7e7;
        }
        input{
            text-decoration:none;
            border-radius: 15px;
            color:seagreen;
            padding: 10px 10px;
        }
        form{
            background-color:#56b4b7;
            border-radius:40px;
            position: absolute;
            left:500px;
            right:500px;
        }
        footer{
            position:fixed;
            left:0;
            bottom:0;
            color:#44566c;
            text-align: left;
            font-size: 15px;
        }
        </style>
    </head>
    <body>
        <h1>ajouter des cheques, lcns, vignettes a votre caisse</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
            identifiant:<input name="id" type="number"/><br><br>
            numero de cheque:<input name="cheque" type="number"/><br>
            somme cheque:<input name="scheque" type="number"/><br><br>      
            vignette:<input name="vignette" type="text"/><br>
            somme vignette:<input name="svignette" type="number"/><br><br>
            lcn:<input name="lcn" type="text"/><br>
            somme lcn:<input name="slcn" type="number"/><br><br>           
            <input type="submit" value="Valider"/>
            <input type="reset" value="Annuler"/>
            <a href="accueil.html">Retour à l'accueil</a><br><br>
        </form>
        <?php
            $server="localhost";
            $user="root";
            $pass="";
            $db="credit";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $id=test_input($_POST["id"]);
                $cheque=test_input($_POST["cheque"]);
                $sommec=test_input($_POST["scheque"]);
                $vignette=test_input($_POST["vignette"]);
                $svignette=test_input($_POST["svignette"]);
                $lcn=test_input($_POST["lcn"]);
                $slcn=test_input($_POST["slcn"]);
                $conn=new mysqli($server,$user,$pass,$db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql="INSERT into caisse values ($id,$cheque,$sommec,'$lcn',$slcn,'$vignette',$svignette,0)";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
                $conn->close();
            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        <br><br>
        <footer>
            email : 123@gmail.com<br>
            numero de telephone: 0612345678<br>
            numero fixe : 0512345678<br>
            adresse : karia ba mohammed,Taounate,Fes-Meknes,Maroc<br>
        </footer>
    </body>
</html>