<?php

namespace repo;

use core\repo\Repositorio;
use models\Usuario;

class UsuarioRepositorio extends Repositorio {

    public function __construct() {
        parent::__construct(Usuario::class);
    }

    /**
     * Buscar usuario por email
     *
     * @param $email E-mail do usuário
     * @return Usuario
     * @throws Exception Erro de acesso ao banco de dados
     */
    public function obterPorEmail(string $email): ?Usuario {

        $email = $this->mysqli->real_escape_string($email);

        $stmt = $this->mysqli->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if (($usuario = $result->fetch_object()))
            return Usuario::from($usuario);

        return null;
    }

    /**
     * Buscar usuario por email e senha
     *
     * @param $email E-mail do usuário
     * @param $senha Senha do usuário
     * @return Usuario
     * @throws Exception Erro de acesso ao banco de dados
     */
    public function obterPorEmailESenha(string $email, string $senha): ?Usuario {

        $email = $this->mysqli->real_escape_string($email);
        $senha = $this->mysqli->real_escape_string($senha);

        $usuario = $this->obterPorEmail($email);

        if ($usuario && password_verify($senha, $usuario->getSenha()))
            return $usuario;

        return null;
    }

}