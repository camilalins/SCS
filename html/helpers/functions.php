<?php

function b64JsonEncode($data): string {
    return base64_encode(json_encode($data));
}

