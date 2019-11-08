<?php

function output_error(string $message, int $response_code = null)
{
    if (!is_null($response_code))
        http_response_code($response_code);
    print($message . "<br />" . PHP_EOL);
}

// *      400: 'Bad Request'
// *      401: 'Unauthorized'
// *      403: 'Forbidden'
// *      413: 'Request Entity Too Large'
// *      414: 'Request-URI Too Large'
// *      415: 'Unsupported Media Type'
// *      500: 'Internal Server Error'
// *      501: 'Not Implemented'

?>