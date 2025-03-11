<?php

namespace App\Controllers;
use App\Services\BaseController;

use eftec\bladeone\BladeOne;

class IndexController extends BaseController
{
    protected $blade;

    public function __construct()
    {
        // Configurar BladeOne
        $this->blade = new BladeOne(VIEWS_PATH, CACHE_PATH, BladeOne::MODE_DEBUG);
    }

    public function index()
    {
        // Passar dados para a view e renderizar
        return $this->blade->run('home', ['title' => 'Welcome to SysMVC2025!']);
    }
}
