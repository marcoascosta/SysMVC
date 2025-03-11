<?php

use Pecee\SimpleRouter\SimpleRouter as Router;
use App\Controllers\HomeController;
use App\Controllers\IndexController;
use App\Controllers\TesteController;
use App\Controllers\CrudExampleController;
use App\Controllers\TwigExampleController;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Nyholm\Psr7\Factory\Psr17Factory;



Router::get('/index', [IndexController::class, 'index'])->name('index');

Router::get('/', function () {
    $container = $GLOBALS['container'];
    $controller = $container->get(HomeController::class);
    $psrFactory = new Psr17Factory();
    $request = $psrFactory->createServerRequest('GET', '/');
    return $controller->index($request);
})->name('home');

// Nova rota para TesteController
Router::get('/testecontainer', function () {
    $container = $GLOBALS['container'];
    $controller = $container->get(TesteController::class);
    $psrFactory = new Psr17Factory();
    $request = $psrFactory->createServerRequest('GET', '/teste');
    return $controller->index($request);
})->name('teste');

Router::get('/about', function () {
    $container = $GLOBALS['container'];
    $controller = $container->get(HomeController::class);
    return $controller->about();
})->name('about');

Router::get('/home/details', function () {
    $container = $GLOBALS['container'];
    $controller = $container->get(HomeController::class);
    return $controller->details();
})->name('details');

Router::get('/readme', function () {
    $container = $GLOBALS['container'];
    $controller = $container->get(HomeController::class);
    return $controller->readme();
})->name('readme');

Router::get('/home/database', function () {
    $container = $GLOBALS['container'];
    $controller = $container->get(HomeController::class);
    return $controller->database();
})->name('database');

Router::get('/home/dependency-injection', function () {
    $container = $GLOBALS['container'];
    $controller = $container->get(HomeController::class);
    return $controller->dependencyInjection();
})->name('dependency-injection');

Router::get('/home/app-development', function () {
    $container = $GLOBALS['container'];
    $controller = $container->get(HomeController::class);
    return $controller->appDevelopment();
})->name('app-development');

// Novas rotas para os novos cards
Router::get('/home/templates-blade', function () {
    $container = $GLOBALS['container'];
    $controller = $container->get(HomeController::class);
    return $controller->templatesBlade();
})->name('templates-blade');

Router::get('/home/security', function () {
    $container = $GLOBALS['container'];
    $controller = $container->get(HomeController::class);
    return $controller->security();
})->name('security');

Router::get('/home/console-cli', function () {
    $container = $GLOBALS['container'];
    $controller = $container->get(HomeController::class);
    return $controller->consoleCli();
})->name('console-cli');





// Agrupamento de rotas para "crudexample"
Router::group(['prefix' => '/crudexample'], function () {
    Router::get('/', function () {
        $container = $GLOBALS['container'];
        $controller = $container->get(CrudExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('GET', '/');    
        return $controller->index($request);
    })->name('crudexample.index');

    Router::get('/create', function () {
        $container = $GLOBALS['container'];
        $controller = $container->get(CrudExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('GET', '/create');    
        return $controller->create($request);
    })->name('crudexample.create');

    Router::post('/', function () {
        $container = $GLOBALS['container'];
        $controller = $container->get(CrudExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('GET', '/store');    
        return $controller->store($request);
    })->name('crudexample.store');

    Router::get('/edit/{id}', function ($id) {
        $container = $GLOBALS['container'];
        $controller = $container->get(CrudExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('GET', "/edit/{$id}");
        return $controller->edit($request, $id);
    })->name('crudexample.edit');
    
    Router::post('/update/{id}', function ($id) {
        $container = $GLOBALS['container'];
        $controller = $container->get(CrudExampleController::class);
        return $controller->update($id);
    })->name('crudexample.update');

    Router::post('/delete/{id}', function ($id) {
        $container = $GLOBALS['container'];
        $controller = $container->get(CrudExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('POST', "/delete/{$id}");
        return $controller->delete($request, $id);
    })->name('crudexample.delete');

    Router::get('/show/{id}', function ($id) {
        $container = $GLOBALS['container'];
        $controller = $container->get(CrudExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('GET', "/show/{$id}");
        return $controller->show($request, $id);
    })->name('crudexample.show');
});














// Agrupamento de rotas para "twigexample"
Router::group(['prefix' => '/twigexample'], function () {
    Router::get('/', function () {
        $container = $GLOBALS['container'];
        $controller = $container->get(TwigExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('GET', '/');
        return $controller->index($request);
    })->name('twigexample.index');

    Router::get('/create', function () {
        $container = $GLOBALS['container'];
        $controller = $container->get(TwigExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('GET', '/create');
        return $controller->create($request);
    })->name('twigexample.create');

    Router::get('/edit/{id}', function ($id) {
        $container = $GLOBALS['container'];
        $controller = $container->get(TwigExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('GET', "/edit/$id");
        return $controller->edit($request, $id);
    })->name('twigexample.edit');

    Router::get('/show/{id}', function ($id) {
        $container = $GLOBALS['container'];
        $controller = $container->get(TwigExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('GET', "/show/$id");
        return $controller->show($request, $id);
    })->name('twigexample.show');

    Router::post('/delete/{id}', function ($id) {
        $container = $GLOBALS['container'];
        $controller = $container->get(TwigExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('POST', "/delete/$id");
        return $controller->delete($request, $id);
    })->name('twigexample.delete');

    Router::post('/store', function () {
        $container = $GLOBALS['container'];
        $controller = $container->get(TwigExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('POST', '/store');
        return $controller->store($request);
    })->name('twigexample.store');

    Router::post('/update/{id}', function ($id) {
        $container = $GLOBALS['container'];
        $controller = $container->get(TwigExampleController::class);
        $psrFactory = new Psr17Factory();
        $request = $psrFactory->createServerRequest('POST', "/update/$id");
        return $controller->update($request, $id);
    })->name('twigexample.update');
});















// Tratamento de erro 404, ignorando arquivos estáticos
Router::error(function ($request, \Exception $exception) {
    $extensoesIgnoradas = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'ico', 'svg', 'webp', 'woff', 'woff2', 'ttf'];
    $path = $request->getUrl()->getPath();
    $extensao = pathinfo($path, PATHINFO_EXTENSION);

    // Se a requisição for para um arquivo estático, apenas retorna sem tratamento
    if (in_array(strtolower($extensao), $extensoesIgnoradas)) {
        return;
    }

    // Tratamento para erro 404
    if ($exception instanceof NotFoundHttpException) {
        http_response_code(404);
        echo file_get_contents(__DIR__ . '/../resources/views/errors/404.html');
        exit;
    }

    // Tratamento para erro 403
    if ($exception instanceof NotFoundHttpException) {
        http_response_code(403);
        echo file_get_contents(__DIR__ . '/../resources/views/errors/403.html');
        exit;
    }
});
