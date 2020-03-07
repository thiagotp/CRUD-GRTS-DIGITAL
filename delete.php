<?php
session_start();
require_once('config.php');

if($_SESSION["logado"]!=true){
   header("Location: login.php");
}
 
  $id = $_GET["id"];

  if($connect->query("DELETE FROM endereco WHERE cliente_id=$id")){

    $connect->query("DELETE FROM clientes WHERE id=$id");

  }
  header("location:home.php");





?>