<?php

# SYSTEM MESSAGES
const MSG_GERAL_ERR_A001 = [ "pt-BR" => "Falha na aplicação", "en-US" => "Fail at application" ];
const MSG_GERAL_ERR_A002 = [ "pt-BR" => "Falha ao executar", "en-US" => "Failed to run" ];
const MSG_AUTH_ERR_A001 = [ "pt-BR" => "Nenhum usuario para autenticar", "en-US" => "No user to authenticate" ];
const MSG_AUTH_ERR_A002 = [ "pt-BR" => "CRSF Token não encontrado", "en-US" => "CRSF Token not found" ];
const MSG_AUTH_ERR_A003 = [ "pt-BR" => "CRSF Token inválido", "en-US" => "CRSF Token is invalid" ];
const MSG_VALID_ERR_A001 = [ "pt-BR" => "Preencha os campos obrigatórios", "en-US" => "Please fill the required fields" ];
const MSG_VALID_ERR_A002 = [ "pt-BR" => "Preencha os campos obrigatórios com dados válidos", "en-US" => "Please fill the required fields with valid data" ];
const MSG_LOGIN_ERR_A001 = [ "pt-BR" => "Usuário e/ou senha inválidos", "en-US" => "User or password are invalid" ];
const MSG_RECOV_ERR_A001 = [ "pt-BR" => "E-mail não encontrado", "en-US" => "E-mail not found" ];
const MSG_RECOV_INFO_A001 = [ "pt-BR" => "E-mail de recuperação enviado com sucesso", "en-US" => "Recovery passsword sent" ];
const MSG_RECOV_ERR_A002 = [ "pt-BR" => "Ocorreu um erro. Tente novamente mais tarde", "en-US" => "There's an error. Please try again" ];
const MSG_REPO_ERR_A001 = [ "pt-BR" => "Por favor informe qual Model o repositório pertence", "en-US" => "" ];
const MSG_REPO_ERR_B001 = [ "pt-BR" => "É necessário usar uma classe marcada com @Entity na instanciação do Repositório", "en-US" => "" ];
const MSG_REPO_ERR_A002 = [ "pt-BR" => "O Model do repositório precisa ser derivada de core\Model", "en-US" => "" ];
const MSG_REPO_ERR_B002 = [ "pt-BR" => "É necessário usar uma classe derivada de core/Model na instanciação do Repositório", "en-US" => "" ];
const MSG_REPO_ERR_A003 = [ "pt-BR" => "Não foi possível conectar", "en-US" => "" ];
const MSG_REPO_ERR_A004 = [ "pt-BR" => "DTO precisar ser um objeto ou array associativo", "en-US" => "" ];
const MSG_REPO_ERR_A005 = [ "pt-BR" => "DTO precisar ser um objeto ou array associativo ou um número inteiro", "en-US" => "" ];
const MSG_REPO_ERR_A006 = [ "pt-BR" => "DTO precisa conter um Id", "en-US" => "" ];
const MSG_REPO_ERR_A007 = [ "pt-BR" => "DTO não pode ser vazio", "en-US" => "" ];
const MSG_REPO_ERR_A008 = [ "pt-BR" => "Nenhuma entidade encontrada para ser removida", "en-US" => "" ];
const MSG_REPO_ERR_A009 = [ "pt-BR" => "Para atualizar é necessário informar o atributo Id", "en-US" => "" ];
const MSG_REPO_ERR_A010 = [ "pt-BR" => "Cláusula não pode ser vazia", "en-US" => "Clause cannot be empty" ];
const MSG_ENT_ERR_A001 = [ "pt-BR" => "Não foi possível salvar", "en-US" => "Can't save" ];
const MSG_ENT_ERR_A002 = [ "pt-BR" => "Nenhum registro encontrado", "en-US" => "No data found" ];
const MSG_CLI_ERR_A001 = [ "pt-BR" => "Informe ao menos um filtro para pesquisar", "en-US" => "Inform at least one filter for search" ];

const ERR_SOL_ERR_001 = [ "pt-BR" => "Não há página personalizada para este cliente", "en-US" => "There's no custom page for this customer" ];

function sys_messages($name, $details=null, $locale=null): string {
    return $name[$locale?:(LOCALE)].(DEBUG_MODE == 1 && DEBUG_LEVEL == DEBUG_LEVEL_HIGH && $details ? ": ".$details : "");
}

