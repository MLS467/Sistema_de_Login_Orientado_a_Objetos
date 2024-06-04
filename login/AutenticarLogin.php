<?php
require_once "../class/config.php";
require_once "../class/Login.php";

$email = limparPost($_POST['email']);
$senha = limparPost($_POST['senha']);
$senhaCript = sha1($senha);
$token = sha1(uniqid() . date("Y-m-d-H-i-s"));

$login = new Login($email, $senhaCript, $token);

$verificar = $login->isAutenticar();

if ($verificar) {
    $_SESSION['Token'] = $token;
    $_SESSION['User'] = $login->isAutenticado($token);
    header("location:areaRestrita.php");
} else {
    $_SESSION["ERRO"] = "Registro não encontrado!";
    header("location:../index.php");
}