<?php

function autoload($nomeClasse)
{
    $path = __DIR__ . "/class/" . $nomeClasse . ".php";
    $outroSistema = str_replace("\\", DIRECTORY_SEPARATOR, $path);

    if (is_file($outroSistema)) {
        require_once $outroSistema;
    }
}

spl_autoload_register('autoload');