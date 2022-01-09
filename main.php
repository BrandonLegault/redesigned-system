<?php

include __DIR__ . '/src/Players.php';

$playersObject = new Players();
$playersObject->display(php_sapi_name() === 'cli', 'array');
