<?php

namespace models;

use core\Model;

/**
 * @Entity("cliente_form")
 */
class ClienteForm extends Model {

    /** * @Id */
    private Int $id;
    /** * @Column("cliente_id") */
    private float $clienteId;
    private String $nome;

    /**
     * @param Int $clienteId
     * @param String $nome
     */
    public function __construct(Int $clienteId=0, string $nome="")
    {
        $this->id = 0;
        $this->clienteId = $clienteId;
        $this->nome = $nome;
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
     * @return float|Int
     */
    public function getClienteId(): float|int
    {
        return $this->clienteId;
    }

    /**
     * @param float|Int $clienteId
     */
    public function setClienteId(float|int $clienteId): void
    {
        $this->clienteId = $clienteId;
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



    public function jsonSerialize(): mixed {
        return get_object_vars($this);
    }
}