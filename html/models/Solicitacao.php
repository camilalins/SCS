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
    private String $cliente;
    private String $placa;

    /**
     * @param String $data
     * @param String $cliente
     * @param String $placa
     */
    public function __construct(string $data="", string $cliente="", string $placa="")
    {
        $this->id = 0;
        $this->data = $data;
        $this->cliente = $cliente;
        $this->placa = $placa;
    }

    /**
     * @return Int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param Int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
    public function getCliente(): ?string
    {
        return $this->cliente;
    }

    /**
     * @param string|null $cliente
     */
    public function setCliente(?string $cliente): void
    {
        $this->cliente = $cliente;
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