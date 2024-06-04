<?php
require_once "Crud.php";
require_once "DB.php";


class Usuario extends Crud
{
    protected string $nomeTabela;
    private string $nome;
    private string $email;
    private string $token;
    private ?bool $status;
    private string $data;
    private string $senha;
    private string $repeteSenha;
    public array $erro = [];


    public function __construct(
        string $nome,
        string $email,
        string $senha,
        string $repeteSenha
    ) {
        $this->nomeTabela = 'usuarios';
        $this->data = "";
        $this->status = null;
        $this->setToken(sha1(uniqid() . date("d-m-Y-H-i-s")));
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->repeteSenha = $repeteSenha;
    }


    // CRUD INSERT E UPDATE O OUTROS SÃO HERDADOS DA CLASSE ABSTRATA CRUD
    public  function insert()
    {
        //PROCURAR SE USUÁRIO JÁ ESTÁ CADASTRADO
        $procUsuario = "SELECT * FROM $this->nomeTabela WHERE email = ?";
        $procUsuario = DB::prepare($procUsuario);
        $procUsuario->execute(array($this->getEmail()));
        $procUsuario->fetch();

        // CHAMA A VALIDAÇÃO DOS CAMPOS E INSERE CASO NÃO HOUVER ERROS
        if ($this->validaCampos() && $procUsuario->rowCount() == 0) {
            $this->setData(date("d-m-Y"));
            $senha = sha1($this->senha);
            $sql = "INSERT INTO $this->nomeTabela 
        VALUES (null,?,?,?,?,?,?)";
            $sql = DB::prepare($sql);
            return $sql->execute(array(
                $this->nome, $this->email, $this->token,
                $this->status, $this->data, $senha
            ));
        } else {
            $this->erro["cadastrado"] = "User já cadastrado!";
            return false;
        }
    }


    public function update()
    {
    }

    // VALIDAR CAMPOS

    private function validaCampos(): bool
    {
        $controle = true;

        if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", $this->getNome())) {
            $this->erro['erroNome'] = "erroNome";
            $controle = false;
        }

        if (!filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $this->erro['erroEmail'] = "erroEmail";
            $controle = false;
        }

        if (!(strlen($this->getSenha()) > 6)) {
            $this->erro['erroSenha'] = "erroSenha";
            $controle = false;
        }

        if ($this->getSenha() != $this->getRepeteSenha()) {
            $this->erro['erroRepeteSenha'] = "erroRepeteSenha";
            $controle = false;
        }

        return $controle;
    }


    // GETTERS E SETTERS

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    // Getter e Setter 
    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): void
    {
        $this->status = $status;
    }


    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): void
    {
        $this->data = $data;
    }


    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }


    public function getRepeteSenha(): string
    {
        return $this->repeteSenha;
    }

    public function setRepeteSenha(string $repeteSenha): void
    {
        $this->repeteSenha = $repeteSenha;
    }
}