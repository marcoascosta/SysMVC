<?php

namespace App\Controllers;
use App\Services\BaseController;

use eftec\bladeone\BladeOne;

class IndexController extends BaseController
{
    protected $blade;

    public function __construct()
    {
        // Configure BladeOne
        $this->blade = new BladeOne(VIEWS_PATH, CACHE_PATH, BladeOne::MODE_DEBUG);
    }

    public function index()
    {
        // Pass data to the view and render
        return $this->blade->run('home', ['title' => 'Welcome to SysMVC2025!']);
    }
}
