<?php

namespace repositorios;

use mysqli;
use Exception;

include_once "../config/const.php";

class UsuarioRepositorio {

    private $mysqli;

    public function __construct() {

        $this->mysqli = new mysqli(
            MYSQL_HOST,
            MYSQL_USER,
            MYSQL_PASS,
            MYSQL_DATABASE,
            MYSQL_PORT
        ) or throw new Exception("Não foi possível conectar"); //$this->mysqli->connect_error

    }

    /**
     * Buscar usuario por email e senha
     *
     * @param $email E-mail do usuário
     * @param $senha Senha do usuário
     * @return Usuario
     * @throws Exception Erro de acesso ao banco de dados
     */
    public function buscarPorEmailESenha($email, $senha) {

        $email = $this->mysqli->real_escape_string($email);
        $senha = $this->mysqli->real_escape_string($senha);

        $stmt = $this->mysqli->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if (($usuario = $result->fetch_object()) &&
            password_verify($senha, $usuario->senha))
            return $usuario;

        return null;
    }


    // Outras funções do modelo aqui...
}

?>
