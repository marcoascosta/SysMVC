<?php

namespace App\Controllers;

use eftec\bladeone\BladeOne;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Monolog\Logger;
use App\Services\BaseController;

class TesteController extends BaseController
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
        $data = ['title' => 'Bem-vindo ao TesteController'];
        $this->logger->info('Exibindo a página do TesteController.');
        return $this->blade->run('test', $data);
    }
}

