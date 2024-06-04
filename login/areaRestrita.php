<!-- TESTAR SE TOKEN BATE COM O DO USUÁRIO -->
<?php require_once "../class/config.php";

if (!isset($_SESSION['User']) or !isset($_SESSION['Token']) or ($_SESSION['User'] <> $_SESSION['Token']) or empty($_SESSION['User'] or empty($_SESSION['Token']))) {
    $_SESSION['ERRO'] = 'Usuário inválido!';
    header("location:../index.php");
} else {
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>BEM VINDO À ÁREA RESTRITA! </h1>
</body>

</html>

<?php

}

?>