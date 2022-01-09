<?php

include __DIR__ . '/src/formatter/GetFormatter.php';
include __DIR__ . '/src/data/ArraySource.php';
include __DIR__ . '/src/Players.php';

$formatter = GetFormatter(php_sapi_name());
$players = new Players(new ArraySource());
$players->display($formatter);
