<?php

function abort($message, $code = 200)
{
    http_response_code($code);
    exit($message);
}