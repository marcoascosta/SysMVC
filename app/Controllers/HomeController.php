<?php

namespace App\Controllers;

use eftec\bladeone\BladeOne;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Monolog\Logger;
use App\Services\BaseController;

class HomeController extends BaseController
{
    protected $blade;
    protected $logger;

    public function __construct(BladeOne $blade, Logger $logger)
    {
        $this->blade = $blade;
        $this->logger = $logger;
    }

    public function index(Request $request): string
    {
        $data = ['title' => 'Welcome to SysMVC'];
        return $this->blade->run('home', $data);
    }

    public function about(): string
    {
        try {
            $this->logger->info('Displaying the About page.');
            return $this->blade->run('home.about');
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the About page: ' . $e->getMessage());
            return 'Error displaying the About page: ' . $e->getMessage();
        }
    }

    public function details(): string
    {
        try {
            $this->logger->info('Displaying the Learn More page.');
            return $this->blade->run('home.details');
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the Details page: ' . $e->getMessage());
            return 'Error displaying the Learn More page: ' . $e->getMessage();
        }
    }

    public function readme(): string
    {
        try {
            $this->logger->info('Displaying the ReadMe page.');
            return $this->blade->run('home.readme');
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the ReadMe page: ' . $e->getMessage());
            return 'Error displaying the ReadMe page: ' . $e->getMessage();
        }
    }

    public function database(): string
    {
        try {
            $this->logger->info('Displaying the Database Usage page.');
            return $this->blade->run('home.database');
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the Database Usage page: ' . $e->getMessage());
            return 'Error displaying the Database Usage page: ' . $e->getMessage();
        }
    }

    public function dependencyInjection(): string
    {
        try {
            $this->logger->info('Displaying the Dependency Injection page.');
            return $this->blade->run('home.dependency-injection');
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the Dependency Injection page: ' . $e->getMessage());
            return 'Error displaying the Dependency Injection page: ' . $e->getMessage();
        }
    }

    public function appDevelopment(): string
    {
        try {
            $this->logger->info('Displaying the App Development page.');
            return $this->blade->run('home.app-development');
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the App Development page: ' . $e->getMessage());
            return 'Error displaying the App Development page: ' . $e->getMessage();
        }
    }

    // New methods
    public function templatesBlade(): string
    {
        try {
            $this->logger->info('Displaying the Blade Templates page.');
            return $this->blade->run('home.templates-blade');
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the Blade Templates page: ' . $e->getMessage());
            return 'Error displaying the Blade Templates page: ' . $e->getMessage();
        }
    }

    public function security(): string
    {
        try {
            $this->logger->info('Displaying the Security page.');
            return $this->blade->run('home.security');
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the Security page: ' . $e->getMessage());
            return 'Error displaying the Security page: ' . $e->getMessage();
        }
    }

    public function consoleCli(): string
    {
        try {
            $this->logger->info('Displaying the Console CLI page.');
            return $this->blade->run('home.console-cli');
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the Console CLI page: ' . $e->getMessage());
            return 'Error displaying the Console CLI page: ' . $e->getMessage();
        }
    }
}
