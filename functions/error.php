<?php
require ("header.php");

function output_error(string $message, int $response_code = null)
{
    if (!is_null($response_code))
        http_response_code($response_code);
    print($message . "<br />" . PHP_EOL);
}

?>