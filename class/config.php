<?php
session_start();

// DEFININDO AS CONSTANTES PARA SER USADAS NO BD

define("SERVIDOR", "localhost");
define("BANCO", "php_poo");
define("USUARIO", "root");
define("SENHA", "");


// FUNÇÃO DE LIMPEZA DE POST

function limparPost($dados)
{
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
}