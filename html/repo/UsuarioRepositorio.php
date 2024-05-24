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
            return Usuario::deserialize($usuario);

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

    /**
     * Atualiza a senha do usuário pelo seu e-mail
     *
     * @param string $email O e-mail do usuário
     * @param string $novaSenha A nova senha do usuário
     * @return bool Retorna true se a senha for atualizada com sucesso, caso contrário, false
     * @throws Exception Se houver um erro ao executar a consulta SQL
     */
    public function atualizarSenha(string $email, string $novaSenha): bool {
        $email = $this->mysqli->real_escape_string($email);

        // Hash da nova senha
        $hashedPassword = password_hash($novaSenha, PASSWORD_BCRYPT);

        $sql = "UPDATE {$this->meta->table->qualifiedName} SET senha = ? WHERE email = ?";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql);

        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ss", $hashedPassword, $email);
        $stmt->execute();

        $success = $stmt->affected_rows > 0;

        $stmt->close();

        return $success;
    }

}