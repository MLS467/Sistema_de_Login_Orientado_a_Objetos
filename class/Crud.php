<?php
require_once "DB.php";

abstract class Crud extends DB
{
    protected string $nomeTabela;


    protected abstract function insert();
    protected abstract function update();

    public function procurarReg($id)
    {
        $sql = "SELECT * FROM $this->nomeTabela WHERE id = ?";
        $sql = DB::prepare($sql);
        $sql->execute(array($id));
        return $sql->fech();
    }

    public function ProcurarTodos()
    {
        $sql = "SELECT * FROM $this->nomeTabela";
        $sql = DB::prepare($sql);
        $sql->execute();
        return $sql->fech();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->nomeTabela WHERE id = ?";
        $sql = DB::prepare($sql);
        return  $sql->execute(array($id));
    }
}