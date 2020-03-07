<?php

session_start();
    require_once('config.php');

    if($_SESSION["logado"]!=true){
        header("Location: index.php");
    }
   
   
   $validacao = true;
    
        $idCliente = $_POST['idCliente'];
        $nome_empresa = $_POST['nome_empresa'];
        $nome_responsavel = $_POST['nome_responsavel'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $idPrincipal = $_POST['id_principal'];
        $cnpj = $_POST['cnpj'];



        if($validacao){

        //Inserindo no Banco:
        	

            $connect->query("UPDATE clientes SET cnpj='$cnpj', nome_responsavel='$nome_responsavel',nome_empresa='$nome_empresa',email='$email',telefone='$telefone' WHERE id=$idCliente");


            header("Location: home.php");
    
        

        }



?>