<!DOCTYPE html>
<html>
    <head>
        <title>
            fournisseur
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
            left:300px;
            right:300px;
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
            numero de facture:<input name="facture" type="number" />
            somme de la facture:<input name="somme" type="number" /><br>
            date d'arrivée de la facture:<input  name="datarr" type="text"><br>           
            <p>mode de paiement:</p><br>
            numero de cheque:<input name="cheque" type="number"/>
            somme cheque:<input name="scheque" type="number"/><br>
            date de creation du cheque:<input name="datche" type="text"/><br>           
            vignette:<input name="vignette" type="number"/>
            lcn:<input name="lcn" type="number"/>
            date de creation de lcn:<input name="datlcn" type="text"/><br>           
            <p>type d'essence:</p>
            gasoil:<input name="gasoil" type="number"/>
            essence:<input name="essence" type="number"/><br><br>
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
                $nf=test_input($_POST["facture"]);
                $sf=test_input($_POST["somme"]);
                $date1=test_input($_POST["datarr"]);
                $cheque=test_input($_POST["cheque"]);
                $sommec=test_input($_POST["scheque"]);
                $datch=test_input($_POST["datche"]);
                $vignette=test_input($_POST["vignette"]);
                $lcn=test_input($_POST["lcn"]);
                $datlcn=test_input($_POST["datlcn"]);
                $gas=test_input($_POST["gasoil"]);
                $essence=test_input($_POST["essence"]);
                $conn=new mysqli($server,$user,$pass,$db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql="INSERT into fournisseur values ($nf,$sf,$date1,$cheque,$sommec,$datch,$lcn,$datlcn,$vignette,$gas,$essence)";
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