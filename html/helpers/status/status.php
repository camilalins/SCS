<?php

# STATUS MESSAGES
const BAD_REQUEST_400 = [ "pt-BR" => "Falha na requisição", "en-US" => "Bad request" ];
const UNAUTHORIZED_401 = [ "pt-BR" => "Não autorizado", "en-US" => "Unauthorized" ];
const NOT_FOUND_404 = [ "pt-BR" => "Não encontrado", "en-US" => "Not found" ];
const METHOD_NOT_ALLOWED_405 = [ "pt-BR" => "Método não permitido", "en-US" => "Method not allowed" ];

function status($const, $locale=null): string {
    return $const[$locale?:(LOCALE?:LOCALE_PT_BR)];
}

