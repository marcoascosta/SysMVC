<?php

use DI\Container;
use eftec\bladeone\BladeOne;
use Pecee\SimpleRouter\SimpleRouter as Router;


require __DIR__ . '/../config/templateengine.php';

require __DIR__ . '/csrf.php';

require __DIR__ . '/../config/envread.php';

require __DIR__ . '/../config/paths.php';

require __DIR__ . '/../config/database.php';

// Registra as rotas
require __DIR__ . '/../routes/auth.php'; // Rotas da AUTH
require __DIR__ . '/../routes/web.php';  // Rotas da aplicação web
require __DIR__ . '/../routes/api.php';  // Rotas da API

require __DIR__ . '/../config/container.php';

require __DIR__ . '/helpers.php';

