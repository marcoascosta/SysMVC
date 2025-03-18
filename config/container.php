<?php

use DI\ContainerBuilder;
use eftec\bladeone\BladeOne;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(true); // Enable autowiring

$containerBuilder->addDefinitions([
    BladeOne::class => function () {
        return new BladeOne(VIEWS_PATH, CACHE_PATH, BladeOne::MODE_AUTO);
    },
    Logger::class => function () {
        $logger = new Logger('app');
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../logs/app.log', Logger::DEBUG));
        return $logger;
    },
    Environment::class => function () {
        $loader = new FilesystemLoader(VIEWS_PATH);
        $twig = new Environment($loader);
        
        // Register the PHP function getCsrfToken
        $csrfFunction = new TwigFunction('csrf', function () {
            return getCsrfToken();
        });
        
        $twig->addFunction($csrfFunction);
        return $twig;
    }
]);

$container = $containerBuilder->build();

// Make the container globally available
$GLOBALS['container'] = $container;







