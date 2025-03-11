<?php

namespace App\Controllers;

use eftec\bladeone\BladeOne;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Monolog\Logger;
use App\Services\Sanitizer;
use App\Services\BaseController;
use App\Models\TwigExample;
use Twig\Environment;

class TwigExampleController extends BaseController
{
    protected $twig;
    protected $logger;
    protected $blade;

    public function __construct(Environment $twig, Logger $logger, BladeOne $blade)
    {
        $this->twig = $twig;
        $this->logger = $logger;
        $this->blade = $blade;
    }

    protected function validateCsrfToken($token)
    {
        return hash_equals($_SESSION['csrf_token'], $token);
    }

    public function index(Request $request): string
    {
        try {
            $twigexample = TwigExample::all();
            $this->logger->info('Exibindo a página do TwigExampleController.');

            if ($twigexample->isEmpty()) {
                $this->logger->warning('Nenhum cadastro encontrado no banco de dados.');
                return 'Nenhum cadastro encontrado no banco de dados.';
            }

            $twigexample = Sanitizer::sanitizeOutput($twigexample->toArray());

            return $this->twig->render('twigexample/index.twig.php', ['twigexample' => $twigexample]);
        } catch (\Exception $e) {
            $this->logger->error('Erro ao consultar o banco de dados: ' . $e->getMessage());
            return 'Erro ao consultar o banco de dados: ' . $e->getMessage();
        }
    }

    public function create(Request $request): string
    {
        try {
            $this->logger->info('Exibindo a página de criação do TwigExampleController.');
            return $this->twig->render('twigexample/create.twig.php', ['csrf_token' => htmlspecialchars(getCsrfToken(), ENT_QUOTES, 'UTF-8')]);
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página de criação: ' . $e->getMessage());
            return 'Erro ao exibir a página de criação: ' . $e->getMessage();
        }
    }

    public function edit(Request $request, $id): string
    {
        try {
            $twigexample = TwigExample::find($id);

            if (!$twigexample) {
                $this->logger->warning("Cadastro com ID $id não encontrado.");
                return "Cadastro com ID $id não encontrado.";
            }

            $twigexample = Sanitizer::sanitizeOutput($twigexample->toArray());

            $this->logger->info("Exibindo a página de edição para o cadastro com ID: $id.");
            return $this->twig->render('twigexample/edit.twig.php', ['twigexample' => $twigexample, 'csrf_token' => htmlspecialchars(getCsrfToken(), ENT_QUOTES, 'UTF-8')]);
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir a página de edição: ' . $e->getMessage());
            return 'Erro ao exibir a página de edição: ' . $e->getMessage();
        }
    }

    public function show(Request $request, $id): string
    {
        try {
            $twigexample = TwigExample::find($id);

            if (!$twigexample) {
                $this->logger->warning("Cadastro com ID $id não encontrado.");
                return "Cadastro com ID $id não encontrado.";
            }

            $twigexample = Sanitizer::sanitizeOutput($twigexample->toArray());

            $this->logger->info("Exibindo o cadastro com ID: $id.");
            return $this->twig->render('twigexample/show.twig.php', ['twigexample' => $twigexample]);
        } catch (\Exception $e) {
            $this->logger->error('Erro ao exibir o cadastro: ' . $e->getMessage());
            return 'Erro ao exibir o cadastro: ' . $e->getMessage();
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $twigexample = TwigExample::find($id);

            if (!$twigexample) {
                $this->logger->warning("Cadastro com ID $id não encontrado.");
                return "Cadastro com ID $id não encontrado.";
            }

            $twigexample->delete();

            $this->logger->info("Cadastro com ID: $id deletado com sucesso.");
            header('Location: /twigexample');
            exit;
        } catch (\Exception $e) {
            $this->logger->error('Erro ao deletar o cadastro: ' . $e->getMessage());
            return 'Erro ao deletar o cadastro: ' . $e->getMessage();
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

            TwigExample::create($data);

            header('Location: /twigexample');
            exit;
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) { // Código de erro para duplicata
                $this->logger->error('Erro ao criar cadastro: Email duplicado.');
                return $this->blade->run('twigexample.create', ['error' => 'Este email já existe.']);
            } else {
                $this->logger->error('Erro ao criar cadastro: ' . $e->getMessage());
                echo 'Erro ao criar cadastro: ' . $e->getMessage();
            }
        }
    }

    public function update(Request $request, $id)
{
    try {
        $data = $_POST;

            if (!isset($data['csrf_token']) || !$this->validateCsrfToken($data['csrf_token'])) {
                throw new \Exception('CSRF token inválido.');
            }

            $data = Sanitizer::sanitizeInput($data);

        $twigexample = TwigExample::find($id);

        if (!$twigexample) {
            $this->logger->warning("Cadastro com ID $id não encontrado.");
            return "Cadastro com ID $id não encontrado.";
        }

        $twigexample->fill($data);
        $twigexample->save();

        $this->logger->info("Cadastro com ID: $id atualizado com sucesso.");
        header('Location: /twigexample');
    } catch (\Exception $e) {
        $this->logger->error('Erro ao atualizar o cadastro: ' . $e->getMessage());
        return 'Erro ao atualizar o cadastro: ' . $e->getMessage();
    }
}

}
