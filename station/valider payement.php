<!DOCTYPE html>
<html>
    <head>
        <title>
           valider le payement
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
        <h1>Remplissez les champs pour enregistrer le payement de votre nouvelle facture</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br><br>
            numero de facture:<input name="facture" type="number" /><br><br>
            payé le :<input name="pay" type="text"/><br><br>
            <input type="submit" value="Valider"/>
            <input type="reset" value="Annuler"/>
            <a href="accueil.html">Retour à l'accueil</a><br><br><br>
        </form>
        <?php
            $server="localhost";
            $user="root";
            $pass="";
            $db="credit";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $nf=test_input($_POST["facture"]);
                $pay=test_input($_POST["pay"]);
                $conn=new mysqli($server,$user,$pass,$db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql="UPDATE fournisseur set payé='$pay' where numerofacture=$nf";
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