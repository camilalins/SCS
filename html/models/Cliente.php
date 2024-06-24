<?php

namespace models;

use core\Model;
use models\enums\cliente\Status;

/**
 * @Entity("cliente")
 */
class Cliente extends Model {

    /** * @Id */
    private Int $id;
    private String $nome;
    private String $cnpj;
    private ?Status $status;
    private ?String $responsavel;
    private ?String $telefone;
    private ?String $email;

    /**
     * @param Int $id
     * @param String $nome
     * @param String $cnpj
     * @param String|null $status
     * @param String|null $responsavel
     * @param String|null $telefone
     * @param String|null $email
     */
    public function __construct(string $nome="", string $cnpj="", ?Status $status=Status::Ativo, ?string $responsavel="", ?string $telefone="", ?string $email="")
    {
        $this->id = 0;
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->status = $status;
        $this->responsavel = $responsavel;
        $this->telefone = $telefone;
        $this->email = $email;
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
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    /**
     * @param string $cnpj
     */
    public function setCnpj(string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?Status $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getResponsavel(): ?string
    {
        return $this->responsavel;
    }

    /**
     * @param string|null $responsavel
     */
    public function setResponsavel(?string $responsavel): void
    {
        $this->responsavel = $responsavel;
    }

    /**
     * @return string|null
     */
    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    /**
     * @param string|null $telefone
     */
    public function setTelefone(?string $telefone): void
    {
        $this->telefone = $telefone;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function jsonSerialize(): mixed {
        return get_object_vars($this);
    }
}