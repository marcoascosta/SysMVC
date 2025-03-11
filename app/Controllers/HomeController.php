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
        $data = ['title' => 'Bem-vindo ao SysMVC'];
        return $this->blade->run('home', $data);
    }

    public function about(): string
    {
        try {
            $this->logger->info('Exibindo a página Sobre.');
            return $this->blade->run('home.about');
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página Sobre: ' . $e->getMessage());
            return 'Erro ao exibir a página Sobre: ' . $e->getMessage();
        }
    }

    public function details(): string
    {
        try {
            $this->logger->info('Exibindo a página Learn More.');
            return $this->blade->run('home.details');
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página Details: ' . $e->getMessage());
            return 'Erro ao exibir a página Learn More: ' . $e->getMessage();
        }
    }

    public function readme(): string
    {
        try {
            $this->logger->info('Exibindo a página ReadMe.');
            return $this->blade->run('home.readme');
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página ReadMe: ' . $e->getMessage());
            return 'Erro ao exibir a página ReadMe: ' . $e->getMessage();
        }
    }

    public function database(): string
    {
        try {
            $this->logger->info('Exibindo a página Uso de Banco de Dados.');
            return $this->blade->run('home.database');
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página Uso de Banco de Dados: ' . $e->getMessage());
            return 'Erro ao exibir a página Uso de Banco de Dados: ' . $e->getMessage();
        }
    }

    public function dependencyInjection(): string
    {
        try {
            $this->logger->info('Exibindo a página Injeção de Dependência.');
            return $this->blade->run('home.dependency-injection');
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página Injeção de Dependência: ' . $e->getMessage());
            return 'Erro ao exibir a página Injeção de Dependência: ' . $e->getMessage();
        }
    }

    public function appDevelopment(): string
    {
        try {
            $this->logger->info('Exibindo a página Desenvolvimento de Apps.');
            return $this->blade->run('home.app-development');
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página Desenvolvimento de Apps: ' . $e->getMessage());
            return 'Erro ao exibir a página Desenvolvimento de Apps: ' . $e->getMessage();
        }
    }

    // Novos métodos
    public function templatesBlade(): string
    {
        try {
            $this->logger->info('Exibindo a página Templates Blade.');
            return $this->blade->run('home.templates-blade');
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página Templates Blade: ' . $e->getMessage());
            return 'Erro ao exibir a página Templates Blade: ' . $e->getMessage();
        }
    }

    public function security(): string
    {
        try {
            $this->logger->info('Exibindo a página Segurança.');
            return $this->blade->run('home.security');
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página Segurança: ' . $e->getMessage());
            return 'Erro ao exibir a página Segurança: ' . $e->getMessage();
        }
    }

    public function consoleCli(): string
    {
        try {
            $this->logger->info('Exibindo a página Console CLI.');
            return $this->blade->run('home.console-cli');
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página Console CLI: ' . $e->getMessage());
            return 'Erro ao exibir a página Console CLI: ' . $e->getMessage();
        }
    }
}
