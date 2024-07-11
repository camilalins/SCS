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
    private String $status;

    /**
     * @param Int $clienteId
     * @param String $data
     * @param String $placa
     * @param String $status
     */
    public function __construct(int $clienteId=0, string $data="", string $placa="", string $status="")
    {
        $this->id = 0;
        $this->clienteId = $clienteId;
        $this->cliente = null;
        $this->data = $data;
        $this->placa = $placa;
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
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function jsonSerialize(): mixed {
        return get_object_vars($this);
    }
}