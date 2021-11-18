<?php

use App\Libraries\DotEnv;

define('PROJECT_PATH', dirname(__DIR__));
define('ENV_PATH', dirname(__DIR__) . '/.env');
define('VIEW_PATH', dirname(__DIR__) . '/resource/views/');
define('CACHE_PATH', dirname(__DIR__) . '/resource/cache/');


(new DotEnv(ENV_PATH))->load();

// echo getenv('DB_DATABASE');
// echo VIEW_PATH;