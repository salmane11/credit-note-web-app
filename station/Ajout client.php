<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter un client</title>
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
        <h1>pour ajouter un nouveau client, veuillez remplire ce formulaire :</h1><br><br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
            id : <input name="id" type="number" /><br><br>
            nom : <input name="name" type="text" /><br><br>
            prenom : <input name="prenom" type="text" /><br><br>
            montant : <input name="montant" type="number" /><br><br>
            <input type="submit" value="Valider"/>
            <input type="reset" value="Annuler"/>
            <a href="accueil.html">Retour à l'accueil</a><br><br>
        </form>
        <?php
            $server="localhost";
            $user="root";
            $pass="";
            $db="credit";
            $id=$montant=0;
            $nom=$prenom="";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $id=test_input($_POST["id"]);
                $nom=test_input($_POST["name"]);
                $prenom=test_input($_POST["prenom"]);
                $montant=test_input($_POST["montant"]);

                $conn=new mysqli($server,$user,$pass,$db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql="INSERT into client values ($id,'$nom','$prenom',$montant)";
                $hist="INSERT into historique (nom,prenom,montant,operation) values ('$nom','$prenom',$montant,'debut credit')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
                if ($conn->query($hist) === TRUE) {
                    echo "<br>Record updated successfully";
                }else {
                    echo "Error updating history: " . $conn->error;
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
