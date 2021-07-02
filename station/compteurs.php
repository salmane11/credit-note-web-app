<!DOCTYPE html>
<html>
    <head>
        <title>
            essence
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
            color:brown;
            padding: 10px 10px;
        }
        form{
            z-index: -1;
            background-color:#56b4b7;
            border-radius:40px;
            position: absolute;
            left:250px;
            right:250px;
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
        <h1>Remplissez les valeurs des compteurs de cette journée</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
            compteurhier1:<input name="compteurh1" type="number"/>
            compteurAuj1:<input name="compteur1" type="number"/><br>
            compteurhier2:<input name="compteurh2" type="number"/>
            compteurAuj2:<input name="compteur2" type="number"/><br>
            compteurhier3:<input name="compteurh3" type="number"/>
            compteurAuj3:<input name="compteur3" type="number"/><br>
            compteurhier4:<input name="compteurh4" type="number"/>
            compteurAuj4:<input name="compteur4" type="number"/><br>
            compteurhier5:<input name="compteurh5" type="number"/>
            compteurAuj5:<input name="compteur5" type="number"/><br>
            prix gasoil:<input name="gasoil" type="number"/><br>
            compteurhier6:<input name="compteurh6" type="number"/>
            compteurAuj6:<input name="compteur6" type="number"/><br>
            compteurhier7:<input name="compteurh7" type="number"/>
            compteurAuj7:<input name="compteur7" type="number"/><br>
            prix essence:<input name="essence" type="number"/><br>
            ajouter à la premiere citerne:<input name="ct1" type="number"/><br>
            ajouter à la deuxieme citerne:<input name="ct2" type="number"/><br>
            ajouter à la troisieme citerne:<input name="ct3" type="number"/><br>
            ajouter à la quatrieme citerne:<input name="ct4" type="number"/><br>
            ajouter à la cinquieme citerne:<input name="ct5" type="number"/><br>
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
                $c1=test_input($_POST["compteur1"]);
                $c2=test_input($_POST["compteur2"]);
                $c3=test_input($_POST["compteur3"]);
                $c4=test_input($_POST["compteur4"]);
                $c5=test_input($_POST["compteur5"]);
                $c6=test_input($_POST["compteur6"]);
                $c7=test_input($_POST["compteur7"]);
                $ch1=test_input($_POST["compteurh1"]);
                $ch2=test_input($_POST["compteurh2"]);
                $ch3=test_input($_POST["compteurh3"]);
                $ch4=test_input($_POST["compteurh4"]);
                $ch5=test_input($_POST["compteurh5"]);
                $ch6=test_input($_POST["compteurh6"]);
                $ch7=test_input($_POST["compteurh7"]);
                $prga=test_input($_POST["gasoil"]);
                $pres=test_input($_POST["essence"]);
                $cit1=test_input($_POST["ct1"]);
                $cit2=test_input($_POST["ct2"]);
                $cit3=test_input($_POST["ct3"]);
                $cit4=test_input($_POST["ct4"]);
                $cit5=test_input($_POST["ct5"]);
                $prixgasoil=($c1+$c2+$c3+$c4+$c5-$ch1-$ch2-$ch3-$ch4-$ch5)*$prga;
                $prixessence=($c6+$c7-$ch6-$ch7)*$pres;
                $prixtot=($c1+$c2+$c3+$c4+$c5-$ch1-$ch2-$ch3-$ch4-$ch5)*$prga+($c6+$c7-$ch6-$ch7)*$pres;
                $conn=new mysqli($server,$user,$pass,$db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql="INSERT into essence(c1,c2,c3,c4,c5,gaingasoil,ce1,ce2,gainessence,prix) values ($c1,$c2,$c3,$c4,$c5,$prixgasoil,$c6,$c7,$prixessence,$prixtot)";
                $sql1="UPDATE stock set citerne1=citerne1-($c1+$c2-$ch1-$ch2)+$cit1 , citerne2=citerne2-($c3-$ch3)+$cit2 ,citerne3=citerne3-($c4-$ch4)+$cit3 ,citerne4=citerne4-($c5-$ch5)+$cit4 , citernee1=citernee1-($c6+$c7-$ch6-$ch7)+$cit5";
                if($c1>=$ch1 && $c2>=$ch2 && $c3>=$ch3 && $c4>=$ch4 && $c5>=$ch5 && $c6>=$ch6 && $c7>=$ch7){
                    if ($conn->query($sql) === TRUE) {
                        echo "Record updated successfully";
                        if ($conn->query($sql1) === TRUE) {
                            echo "<br> Record updated successfully";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }  
                }else{
                    echo "entrer les valeurs correctes";
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