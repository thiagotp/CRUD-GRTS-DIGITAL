<?php

error_reporting(1);
session_start();
require_once('config.php');

if($_SESSION["logado"]!=true){
  header("Location: index.php");
}

var_dump($_POST);


        //Acompanha os erros de validação
        $validacao = true;
    

        $nome_empresa = $_POST['nome_empresa'];
        $telefone = $_POST['telefone'];  
        $email = $_POST['email'];
        $cnpj = $_POST['cnpj'];
        $nome_responsavel = $_POST['nome_responsavel'];

        ////////////////////////////////////////

        $logradouro = $_POST['logradouro'];
        $complemento = $_POST['complemento'];
        $numero = $_POST['numero']; 
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];

        $nome_empresa = ucwords($nome_empresa);
        $nome_responsavel = ucwords($nome_responsavel);
        
        $telefone = str_replace(" ", "", $telefone);
        $telefone = str_replace("(", "", $telefone);
        $telefone = str_replace(")", "", $telefone);
        $telefone = str_replace("-", "", $telefone);



        if($validacao){

        //Inserindo no Banco:

            if($connect->query("INSERT INTO clientes (nome_empresa, email, telefone, nome_responsavel, cnpj) VALUES('$nome_empresa','$email','$telefone','$nome_responsavel','$cnpj')")){

              $lastId = $connect->insert_id;

              $connect->query("INSERT INTO endereco (cliente_id, logradouro, complemento, numero, bairro, cidade, estado, cep) VALUES('$lastId','$logradouro','$complemento','$numero','$bairro', '$cidade', '$estado', '$cep')");

              $connect->query("UPDATE clientes SET id_principal = $connect->insert_id WHERE id=$lastId");

              header("Location: home.php");
            }
    }
?>