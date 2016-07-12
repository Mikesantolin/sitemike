<?php
/**
session_start(); 
include_once("conexao.php");

$usuariot = $_POST['usuario'];
$senhat = $_POST['senha']


//echo $usuariot.' - '.$senhat;

$result = mysqli_query("SELECT * FROM usuarios 
WHERE login='$usuariot' AND senha='$senhat'");

$resultado = mysqli_fetch_assoc($result);
echo $resultado['nome'];	
**/
?>