<?php

use App\Libraries\DotEnv;

define('PROJECT_PATH', dirname(__DIR__));
define('ENV_PATH', dirname(__DIR__). '/.env');


(new DotEnv(ENV_PATH))->load();

echo getenv('DB_DATABASE');