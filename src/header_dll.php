<?php

spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);

    $path = $_SERVER['DOCUMENT_ROOT'] . '/' . $className . '.php';

    require_once realpath($path);
});

function printPre($data)
{
    print_r('<pre>' . print_r($data, true) . '</pre>');
}