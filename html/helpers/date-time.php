<?php
/**
 * @param $locale
 * @param $format
 * @return string
 * @throws Exception
 */
function now($locale=null, $format=null): string {

    return match ($locale) {
        "pt-BR" => (new DateTime("now", new DateTimeZone("America/Sao_Paulo")))->format($format ?: "d/m/Y H:i:s"),
        default => date("Y-m-d H:i:s"),
    };
}