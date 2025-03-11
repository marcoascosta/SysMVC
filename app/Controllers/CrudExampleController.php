<?php

namespace App\Controllers;

use eftec\bladeone\BladeOne;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Monolog\Logger;
use App\Models\CrudExample;
use App\Services\Sanitizer;
use App\Services\BaseController;


class CrudExampleController extends BaseController
{
    protected $blade;
    protected $logger;

    public function __construct(BladeOne $blade, Logger $logger)
    {
        $this->blade = $blade;
        $this->logger = $logger;
    }

    protected function validateCsrfToken($token)
    {
        return hash_equals($_SESSION['csrf_token'], $token);
    }

    public function index(Request $request): string
    {
        try {
            $crudexample = CrudExample::all();
            $this->logger->info('Exibindo a página do CrudExampleController.');

            if ($crudexample->isEmpty()) {
                $this->logger->warning('Nenhum cadastro encontrado no banco de dados.');
                return 'Nenhum cadastro encontrado no banco de dados.';
            }

            $crudexample = Sanitizer::sanitizeOutput($crudexample->toArray());

            return $this->blade->run('crudexample.index', ['crudexample' => $crudexample]);

        } catch (\Exception $e) {
            $this->logger->error('Erro ao consultar o banco de dados: ' . $e->getMessage());
            return 'Erro ao consultar o banco de dados: ' . $e->getMessage();
        }
    }

    public function edit(Request $request, $id): string
    {
        try {
            $this->logger->info('Editando cadastro com ID: ' . $id);
            $crudexample = CrudExample::find($id);
            if (!$crudexample) {
                return 'Cadastro não encontrado';
            }

            $csrfToken = generateCsrfToken();
            $crudexample = Sanitizer::sanitizeOutput($crudexample->toArray());

            return $this->blade->run('crudexample.edit', ['crudexample' => $crudexample, 'csrfToken' => $csrfToken]);
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página de edição: ' . $e->getMessage());
            return 'Erro ao exibir a página de edição: ' . $e->getMessage();
        }
    }

    public function create(): string
    {
        try {
            return $this->blade->run('crudexample.create', ['error' => null]);
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página de criação: ' . $e->getMessage());
            return 'Erro ao exibir a página de criação: ' . $e->getMessage();
        }
    }

    public function store()
    {
        try {
            $data = $_POST;

            if (!isset($data['csrf_token']) || !$this->validateCsrfToken($data['csrf_token'])) {
                throw new \Exception('CSRF token inválido.');
            }

            $data = Sanitizer::sanitizeInput($data);

            if (!isset($data['password']) || empty($data['password'])) {
                throw new \Exception('O campo "password" é obrigatório.');
            }

            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

            CrudExample::create($data);

            header('Location: /crudexample');
            exit;
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) { // Código de erro para duplicata
                $this->logger->error('Erro ao criar cadastro: Email duplicado.');
                return $this->blade->run('crudexample.create', ['error' => 'Este email já existe.']);
            } else {
                $this->logger->error('Erro ao criar cadastro: ' . $e->getMessage());
                echo 'Erro ao criar cadastro: ' . $e->getMessage();
            }
        }
    }

    public function update($id)
    {
        try {
            $data = $_POST;

            if (!isset($data['csrf_token']) || !$this->validateCsrfToken($data['csrf_token'])) {
                throw new \Exception('CSRF token inválido.');
            }

            $data = Sanitizer::sanitizeInput($data);

            if (isset($data['password']) && !empty($data['password'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            } else {
                unset($data['password']);
            }

            $crudexample = CrudExample::find($id);
            if ($crudexample) {
                $crudexample->update($data);
            }

            header('Location: /crudexample');
            exit;
        } catch (\Exception $e) {
            $this->logger->error('Erro ao atualizar cadastro: ' . $e->getMessage());
            echo 'Erro ao atualizar cadastro: ' . $e->getMessage();
        }
    }

    public function show(Request $request, $id): string
    {
        try {
            $crudexample = CrudExample::find($id);
            if (!$crudexample) {
                return 'Cadastro não encontrado';
            }

            $crudexample = Sanitizer::sanitizeOutput($crudexample->toArray());

            return $this->blade->run('crudexample.show', ['crudexample' => $crudexample]);
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir detalhes do cadastro: ' . $e->getMessage());
            return 'Erro ao exibir detalhes do cadastro: ' . $e->getMessage();
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $this->logger->info('Deletando cadastro com ID: ' . $id);
            $crudexample = CrudExample::find($id);
            if ($crudexample) {
                $crudexample->delete();
            }

            header('Location: /crudexample');
            exit;
        } catch (\Exception $e) {
            $this->logger->error('Erro ao deletar cadastro: ' . $e->getMessage());
            echo 'Erro ao deletar cadastro: ' . $e->getMessage();
        }
    }
}
