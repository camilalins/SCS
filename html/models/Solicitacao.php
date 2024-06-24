<?php

namespace models;

use core\Model;
use stdClass;

/**
 * @Entity
 */
class Solicitacao extends Model {

    /** * @Id */
    private Int $id;
    private String $data;
    /** * @Column("cliente_id") */
    private int $clienteId;
    private String $placa;

    /**
     * @param Int $clienteId
     * @param String $data
     * @param String $placa
     */
    public function __construct(int $clienteId=0, string $data="", string $placa="")
    {
        $this->id = 0;
        $this->clienteId = $clienteId;
        $this->data = $data;
        $this->placa = $placa;
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

    public function jsonSerialize(): mixed {
        return get_object_vars($this);
    }
}