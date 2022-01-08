<?php

include __DIR__ . '/src/PlayersObject.php';

$playersObject = new PlayersObject();
$playersObject->display(php_sapi_name() === 'cli', 'array');

?>