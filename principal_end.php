<?php

session_start();
require_once('config.php');

if($_SESSION["logado"]!=true){
   header("Location: login.php");
}
 
 var_dump($_POST);
 $idCliente = $_GET['idCliente'];
 $idEndereco = $_GET['id'];
 

    $connect->query("UPDATE clientes SET id_principal=$idEndereco WHERE id=$idCliente");

  
    header("location:home.php");



?>