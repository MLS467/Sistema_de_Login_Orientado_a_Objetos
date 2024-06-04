<?php
require_once "config.php";
class DB
{
    private static $pdo;


    public static function instanciar()
    {
        //SE NÃO ESTIVER SETADA A CONEXÃO IRÁ FAZER CASO NÃO LANÇARA UMA EXCESSÃO!
        if (!isset($pdo)) {
            try {
                self::$pdo = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO, USUARIO, SENHA);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $th) {
                echo "Não foi possível conectar com a base de dados " . $th->getMessage();
            }
        }

        // RETORNA A PROPRIEDADE DE CONEXÃO
        return self::$pdo;
    }

    public static function prepare($sql)
    {
        // RETORNA A QUERY PREPARADA PARA SER EXECUTADA!
        return self::instanciar()->prepare($sql);
    }
}