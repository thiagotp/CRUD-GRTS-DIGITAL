<?php
error_reporting(1);

session_start();

if($_POST != NULL){
    require_once("config.php");
    if($connect->connect_error){
        echo "Erro de Conexão!<br>".$connect->$connect_error;
    }

    $login = $_POST["login"];
    $password = md5($_POST["password"]);
    
    if ($login != "" && $password != "" ) {
        // Cria o comando SQL
          $sql = "SELECT * FROM adm WHERE usuario = '$login' AND senha = '$password'";
          // Executa no BD
          $retorno = $connect->query($sql);  

          if($registro = $retorno->fetch_array(MYSQLI_ASSOC)){
              $username = $registro["usuario"];
              $id_user = $registro["id"];
          }
          if($username != NULL && $id_user != NULL && $username != "" && $id_user != ""){
          $_SESSION["logado"]=true;
          $_SESSION["name"]=$username;
          $_SESSION["id_user"]=$id_user;
          header("Location:home.php");
          }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>PROJETO GRTS DIGITAL</title>
    <style>
            body
            {
                margin:0;
                padding:0;
                background-color:#81D4FA;
            }
            .box
            {
                width:1270px;
                padding:20px;
                background-color:#fff;
                border:1px solid #ccc;
                border-radius:50px;
                margin-top:25px;
            }
            footer {
                width:100%;
                position: fixed;
                bottom:0;
                left:0;
                background-color:#0288D1; 
                height: 10%;  
            }
            nav {
                width:100%;
                position: fixed;
                top:0;
                left:0;
                background-color:#0288D1;  
                
                height: 40px;
            }
            #btn-off{
                margin: 7px 0 0 95%;
                border: 1px solid white;
                display:inline-block;
                padding: 5px;
            }
            
            h5{
                text-align: center;
                margin: 0;
            }
            a{
                color: black;
            }
            fieldset{
                width: 10%;
                margin:  50px auto;
                height: 200px;
                border-radius: 10px;
                border-color: white;

            }
            img{
                display: block;
                margin: 100px auto 0 auto;
                border-radius: 20%;
            }
            .input-fields{
                display: flex;
                flex-direction: column;
                margin-bottom: 20px;
                border-color: white;
                border: 1px solid white;
            }
            form {
                text-align: center;
                margin-top: 60px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            button {
            background-color: #81D4FA; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border: 1px solid white;
            border-radius: 10%;
            }
            button:hover{
                background-color: #00B0FF;
            }

            
    </style>
</head>
<body>
<img src="data:image/jpeg;base64,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" alt="">
    <fieldset>
    <form action="index.php" method="POST">
        <div>
            <input class="input-fields" type="login" name="login" onkeypress='return filtroTeclasLetras(event)' placeholder="Login" required>
            <input class="input-fields" type="password" name="password" placeholder="Password" required>
        </div>
        <div>
            <button type="submit" class ="submit">Login</button>
        </div>
    </form>
    </fieldset>
    <?php require_once("footer.php") ?>
    <script>
        var filtroTeclasLetras = function(event) {
  return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.keyCode == 13) || (event.keyCode == 32))
}
    </script>
</body>
</html>