<?php

namespace models;

use core\Model;

/**
 * @Entity
 */
class Solicitacao extends Model {

    /** * @Id */
    private Int $id;
    /** * @Column("cliente_id") */
    private int $clienteId;
    /** * @ManyToOne("cliente_id") */
    private ?Cliente $cliente;
    private String $data;
    private String $placa;
    private String $operacao;
    private String $status;

    /**
     * @param Int $clienteId
     * @param String $data
     * @param String $placa
     * @param String $operacao
     * @param String $status
     */
    public function __construct(int $clienteId=0, string $data="", string $placa="", string $operacao="", string $status="")
    {
        $this->id = 0;
        $this->clienteId = $clienteId;
        $this->cliente = null;
        $this->data = $data;
        $this->placa = $placa;
        $this->operacao = $operacao;
        $this->status = $status;
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
     * @return string|null
     */
    public function getClienteId(): int
    {
        return $this->clienteId;
    }

    /**
     * @param string|null $cliente
     */
    public function setClienteId(int $clienteId): void
    {
        $this->clienteId = $clienteId;
    }

    /**
     * @return Cliente
     */
    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     */
    public function setCliente(Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string|null $data
     */
    public function setData(?string $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string|null
     */
    public function getPlaca(): ?string
    {
        return $this->placa;
    }

    /**
     * @param string|null $placa
     */
    public function setPlaca(?string $placa): void
    {
        $this->placa = $placa;
    }

    /**
     * @return string|null
     */
    public function getOperacao(): ?string
    {
        return $this->operacao;
    }

    /**
     * @param string|null $operacao
     */
    public function setOperacao(?string $operacao): void
    {
        $this->operacao = $operacao;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function jsonSerialize(): mixed {
        return get_object_vars($this);
    }
}