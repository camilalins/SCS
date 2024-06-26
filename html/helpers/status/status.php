<?php

# STATUS MESSAGES
const NO_CONTENT_204 = [ "pt-BR" => "Sem conteúdo", "en-US" => "No content" ];
const MOVED_PERMANENTLY_301 = [ "pt-BR" => "Movido permanentemente", "en-US" => "Moved permanently" ];
const BAD_REQUEST_400 = [ "pt-BR" => "Falha na requisição", "en-US" => "Bad request" ];
const UNAUTHORIZED_401 = [ "pt-BR" => "Não autorizado", "en-US" => "Unauthorized" ];
const NOT_FOUND_404 = [ "pt-BR" => "Não encontrado", "en-US" => "Not found" ];
const METHOD_NOT_ALLOWED_405 = [ "pt-BR" => "Método não permitido", "en-US" => "Method not allowed" ];
const TEMPORARILY_UNAVAILABLE_503 = [ "pt-BR" => "Temporariamente indisponível", "en-US" => "Temporarily unavailable" ];

function statusText($const, $locale=null): string {
    return $const[$locale?:(LOCALE)];
}

function status($const){

    return match ($const) {
        NO_CONTENT_204 => ["statusCode" => 204, "responseText" => statusText($const)],
        MOVED_PERMANENTLY_301 => ["statusCode" => 301, "responseText" => statusText($const)],
        BAD_REQUEST_400 => ["statusCode" => 400, "responseText" => statusText($const)],
        UNAUTHORIZED_401 => ["statusCode" => 401, "responseText" => statusText($const)],
        NOT_FOUND_404 => ["statusCode" => 404, "responseText" => statusText($const)],
        METHOD_NOT_ALLOWED_405 => ["statusCode" => 405, "responseText" => statusText($const)],
        TEMPORARILY_UNAVAILABLE_503 => ["statusCode" => 503, "responseText" => statusText($const)],
        default => null,
    };
}


