<?php
require_once('../autoload.php');
require_once('../class/config.php');

if (isset($_POST['enviar'])) {

    $nome = limparPost($_POST['nome']);
    $email = limparPost($_POST['email']);
    $senha = limparPost($_POST['senha']);

    $repeteSenha = limparPost($_POST['repeteSenha']);

    $usuario = new Usuario($nome, $email, $senha, $repeteSenha);

    if ($usuario->insert()) {
        if (count($usuario->erro) > 0) {
            $_SESSION['ERRO'] = $usuario->erro;
            header("location:../index.php");
        } else {
            $_SESSION['OK'] = true;
            header("location:../index.php");
        }
    } else
        $_SESSION['ERRO'] = $usuario->erro;
    header("location:../index.php");
} else
    echo "erro ao inserir";