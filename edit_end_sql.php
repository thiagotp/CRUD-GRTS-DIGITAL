<?php

session_start();
    require_once('config.php');

    if($_SESSION["logado"]!=true){
        header("Location: index.php");
    }
   
   
 

        ////////////////////////////////////////

        $logradouro = $_POST['logradouro'];
        $complemento = $_POST['complemento'];
        $numero = $_POST['numero']; 
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];
        $id = $_POST['id'];

        var_dump($id);



        //Inserindo no Banco:
        	

            $connect->query("UPDATE endereco SET logradouro='$logradouro',complemento='$complemento',numero='$numero', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep' WHERE id=$id");  


            header("Location: home.php");
    
        

        



?>