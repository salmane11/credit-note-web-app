<!DOCTYPE html>
<html>
    <head>
        <title> identification</title>
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
        <h1>Vous Etes Chez Vous</h1><br><br>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br><br><br>
            email : <input name="email" type="email" /><br><br>
            mot de passe : <input name="pass" type="password" /><br><br>
            <input type="submit" value="Se connecter"/>
            <input type="reset" value="Annuler"/><br><br><br>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(test_input($_POST["email"])==="123@gmail.com" && test_input($_POST["pass"])==="123"){
                    header("location: accueil.html");
                    
                }else{
                    echo "mail ou mot de passe invalide";
                }
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
