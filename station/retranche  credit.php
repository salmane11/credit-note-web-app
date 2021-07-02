<!DOCTYPE html>
<html>
    <head>
        <title> retrancher du credit</title>
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
            color:brown;
            padding: 10px 10px;
        }
        form{
            background-color:#56b4b7;
            border-radius:40px;
            position: absolute;
            left:550px;
            right:550px;
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
        <h1>pour retrancher un montant de crédit d'un client, veuillez remplire ce formulaire :</h1><br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
            id : <input name="id" type="number" /><br><br>
            nom : <input name="nom" type="text" /><br><br>
            prenom : <input name="prenom" type="text" /><br><br>
            montant à retrancher : <input name="montant" type="number" /><br><br>
            mode de payement : <input name="mode" type="text" /><br><br>
            <input type="submit" value="Valider"/>
            <input type="reset" value="Annuler"/>
            <a href="accueil.html">Retour à l'accueil</a><br><br>
        </form>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "credit";
            $id=$montant=0;
            $nom=$prenom=$mode="";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $id=test_input($_POST["id"]);
                $montant=test_input($_POST["montant"]);
                $nom=test_input($_POST["nom"]);
                $prenom=test_input($_POST["prenom"]);
                $mode=test_input($_POST["mode"]);
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "UPDATE client SET credit=credit-$montant WHERE id=$id and nom='$nom'";
                $hist="INSERT into historique (nom,prenom,montant,operation,mode) values ('$nom','$prenom',$montant,'retranche','$mode')";
                $cash="UPDATE caisse SET cash=cash+$montant WHERE id=0 ";
                if ($conn->query($sql) === TRUE) {
                    echo "montant retranché";
                } else {
                    echo "erreur lors de l'operation: " . $conn->error;
                }
                if ($conn->query($hist) === TRUE) {
                    echo "<br>historique mis à jour";
                }else {
                    echo "erreur lors de la mise à jour de l'historique: " . $conn->error;
                }
                if($mode==="cash"){
                    if ($conn->query($cash) === TRUE) {
                        echo "montant ajoute a la caisse";
                    } else {
                        echo "erreur lors de l'operation: " . $conn->error;
                    }
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
