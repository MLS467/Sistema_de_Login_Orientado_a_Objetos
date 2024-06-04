<?php require_once("class/config.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login e Cadastro</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    #caixa {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 100vw;
        height: auto;
    }

    .container {
        background-color: #ffffff;
        padding: 20px 40px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    h1 {
        color: #4682b4;
        margin-bottom: 20px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        width: 100%;
        height: 50px;
        display: flex;
        border-radius: 5px;
        padding: 10px;
        align-items: center;
        justify-content: center;
        font-size: 1.5em;
        margin: 0;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        width: 100%;
        height: 50px;
        border-radius: 5px;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5em;
        margin: 0;
    }

    .btn {
        display: inline-block;
        margin: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-login {
        background-color: #5f9ea0;
    }

    .btn-login:hover {
        background-color: #53868b;
    }

    .btn-cadastrar {
        background-color: #1e90ff;
    }

    .btn-cadastrar:hover {
        background-color: #1c86ee;
    }
    </style>
</head>

<body>
    <div id="caixa">

        <div class="container">
            <h1>Bem-vindo!</h1>
            <a href="login/login.php" class="btn btn-login">Login</a>
            <a href="login/cadastro.php" class="btn btn-cadastrar">Cadastrar</a>
        </div>
        <div class="message">
            <pre>
                <?php
                if (isset($_SESSION['ERRO']) and !empty($_SESSION['ERRO'])) {
                    $erros = $_SESSION['ERRO'];
                    if (is_array($erros)) {
                        foreach ($erros as $i) {
                            echo "<p class='alert-danger'>$i</p>";
                        }
                    } else {
                        echo "<p class='alert-danger'>$erros</p>";
                    }
                }

                if (isset($_SESSION["OK"]) and !empty($_SESSION['OK'])) {
                    echo "<p class='alert-success'>Inserido com sucesso!</p>";
                }

                session_unset();
                session_destroy();

                ?>
            </pre>
        </div>
    </div>

</body>

</html>