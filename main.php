<?php

include __DIR__ . '/src/formatter/CliFormatter.php';
include __DIR__ . '/src/formatter/HtmlFormatter.php';
include __DIR__ . '/src/Players.php';

$formatter = php_sapi_name() === 'cli' ? new CliFormatter() : new HtmlFormatter();
$players = new Players();
$players->display($formatter);
