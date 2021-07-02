<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter du crédit</title>
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
        <h1>pour ajouter un montant de crédit d'un client, veuillez remplire ce formulaire :</h1><br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" ><br>
            id : <input name="id" type="number" /><br><br>
            nom : <input name="nom" type="text" /><br><br>
            prenom : <input name="prenom" type="text" /><br><br>
            montant à ajouter : <input name="montant" type="number" /><br><br>
            marchandise : <input name="marchandise" type="text" /><br><br>
            <input type="submit" value="Valider"/>
            <input type="reset" value="Annuler"/>
            <a href="accueil.html">Retour à l'accueil</a><br><br>
        </form>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "credit";
            $id=$montant=null;
            $nom=$prenom=$marchandise=null;
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $id=test_input($_POST["id"]);
                $montant=test_input($_POST["montant"]);
                $nom=test_input($_POST["nom"]);
                $prenom=test_input($_POST["prenom"]);
                $marchandise=test_input($_POST["marchandise"]);
            
            
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = "UPDATE client SET credit=credit+$montant WHERE (id=$id and nom='$nom' and prenom='$prenom')";
                $hist="INSERT into historique (nom,prenom,montant,operation,marchandise) values ('$nom','$prenom',$montant,'ajout','$marchandise')";
                if ($conn->query($sql) === TRUE) {
                    echo "montant ajouté";
                } else {
                    echo "erreur en ajoutant le montant: " . $conn->error;
                }
                if ($conn->query($hist) === TRUE) {
                    echo "<br>opération ajouté à l'historique";
                }else {
                    echo "erreur en ajout à l'historique " . $conn->error;
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
