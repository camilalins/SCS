<?php

namespace models\cliente;

enum Status: string {
    case Ativo = "ativo";
    case Inativo = "inativo";
}