<?php

require_once 'Engine/Autoloader.php';

$theme = 'default';

$prompt = new Application($argv, $argc, $theme);
echo $prompt;
