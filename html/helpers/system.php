<?php

# SYSTEM MESSAGES
const MSG_AUTH_ERR_A001 = [ "pt-BR" => "Nenhum usuario para autenticar", "en-US" => "No user to authenticate" ];
const MSG_VALID_ERR_A001 = [ "pt-BR" => "Preencha os campos obrigatórios", "en-US" => "Please fill the required fields" ];
const MSG_LOGIN_ERR_A001 = [ "pt-BR" => "Usuário e/ou senha inválidos", "en-US" => "User or password are invalid" ];
const MSG_RECOV_ERR_A001 = [ "pt-BR" => "E-mail não encontrado", "en-US" => "E-mail not found" ];
const MSG_RECOV_INFO_A001 = [ "pt-BR" => "E-mail de recuperação enviado com sucesso.", "en-US" => "Recovery passsword sent" ];
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
const MSG_REPO_ERR_A010 = [ "pt-BR" => "Cláusula não pode ser vazia", "en-US" => "" ];

function sys_messages($name, $lang=null): string { return $name[$lang?:(DEF_LANG?:"pt-BR")]; }
