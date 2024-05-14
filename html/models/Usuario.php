<?php

namespace models;

use core\Model;

/**
 * @Entity("usuario")
 */
class Usuario extends Model {

    /** * @Id */
    private Int $id;
    private String $nome;
    private String $email;
    private String $cpf;
    private String $funcao;
    private String $senha;

    /**
     * @param String $nome
     * @param String $email
     * @param String $cpf
     * @param String $funcao
     * @param String $senha
     */
    public function __construct(string $nome="", string $email="", string $cpf="", string $funcao="", string $senha="")
    {
        $this->id = 0;
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->funcao = $funcao;
        $this->senha = $senha;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|String|null
     */
    public function getNome(): mixed
    {
        return $this->nome;
    }

    /**
     * @param mixed|String|null $nome
     */
    public function setNome(mixed $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed|String|null
     */
    public function getEmail(): mixed
    {
        return $this->email;
    }

    /**
     * @param mixed|String|null $email
     */
    public function setEmail(mixed $email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed|String|null
     */
    public function getCpf(): mixed
    {
        return $this->cpf;
    }

    /**
     * @param mixed|String|null $cpf
     */
    public function setCpf(mixed $cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed|String|null
     */
    public function getFuncao(): mixed
    {
        return $this->funcao;
    }

    /**
     * @param mixed|String|null $funcao
     */
    public function setFuncao(mixed $funcao): void
    {
        $this->funcao = $funcao;
    }

    /**
     * @return mixed|String|null
     */
    public function getSenha(): mixed
    {
        return $this->senha;
    }

    /**
     * @param mixed|String|null $senha
     */
    public function setSenha(mixed $senha): void
    {
        $this->senha = $senha;
    }

    public static function from($data=[]): ?Usuario {

        return parent::convert($data, Usuario::class);
    }
}