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
        "en-US" => (new DateTime("now", new DateTimeZone("America/New_York")))->format($format ?: "m/d/Y H:i:s"),
        default => date("Y-m-d H:i:s"),
    };
}