<?php
session_start();
require_once('config.php');

if($_SESSION["logado"]!=true){
  header("Location: login.php");
}
 
$idEndereco = $_GET['id'];


$connect->query("DELETE FROM endereco WHERE id=$idEndereco");



  header("location:home.php");

?>