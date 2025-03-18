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
            $this->logger->info('Displaying the TwigExampleController page.');

            if ($twigexample->isEmpty()) {
                $this->logger->warning('No records found in the database.');
                return 'No records found in the database.';
            }

            $twigexample = Sanitizer::sanitizeOutput($twigexample->toArray());

            return $this->twig->render('twigexample/index.twig.php', ['twigexample' => $twigexample]);
        } catch (\Exception $e) {
            $this->logger->error('Error querying the database: ' . $e->getMessage());
            return 'Error querying the database: ' . $e->getMessage();
        }
    }

    public function create(Request $request): string
    {
        try {
            $this->logger->info('Displaying the creation page of the TwigExampleController.');
            return $this->twig->render('twigexample/create.twig.php', ['csrf_token' => htmlspecialchars(getCsrfToken(), ENT_QUOTES, 'UTF-8')]);
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the creation page: ' . $e->getMessage());
            return 'Error displaying the creation page: ' . $e->getMessage();
        }
    }

    public function edit(Request $request, $id): string
    {
        try {
            $twigexample = TwigExample::find($id);

            if (!$twigexample) {
                $this->logger->warning("Record with ID $id not found.");
                return "Record with ID $id not found.";
            }

            $twigexample = Sanitizer::sanitizeOutput($twigexample->toArray());

            $this->logger->info("Displaying the edit page for the record with ID: $id.");
            return $this->twig->render('twigexample/edit.twig.php', ['twigexample' => $twigexample, 'csrf_token' => htmlspecialchars(getCsrfToken(), ENT_QUOTES, 'UTF-8')]);
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the edit page: ' . $e->getMessage());
            return 'Error displaying the edit page: ' . $e->getMessage();
        }
    }

    public function show(Request $request, $id): string
    {
        try {
            $twigexample = TwigExample::find($id);

            if (!$twigexample) {
                $this->logger->warning("Record with ID $id not found.");
                return "Record with ID $id not found.";
            }

            $twigexample = Sanitizer::sanitizeOutput($twigexample->toArray());

            $this->logger->info("Displaying the record with ID: $id.");
            return $this->twig->render('twigexample/show.twig.php', ['twigexample' => $twigexample]);
        } catch (\Exception $e) {
            $this->logger->error('Error displaying the record: ' . $e->getMessage());
            return 'Error displaying the record: ' . $e->getMessage();
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $twigexample = TwigExample::find($id);

            if (!$twigexample) {
                $this->logger->warning("Record with ID $id not found.");
                return "Record with ID $id not found.";
            }

            $twigexample->delete();

            $this->logger->info("Record with ID: $id deleted successfully.");
            header('Location: /twigexample');
            exit;
        } catch (\Exception $e) {
            $this->logger->error('Error deleting the record: ' . $e->getMessage());
            return 'Error deleting the record: ' . $e->getMessage();
        }
    }

    public function store()
    {
        try {
            $data = $_POST;

            if (!isset($data['csrf_token']) || !$this->validateCsrfToken($data['csrf_token'])) {
                throw new \Exception('Invalid CSRF token.');
            }

            $data = Sanitizer::sanitizeInput($data);

            if (!isset($data['password']) || empty($data['password'])) {
                throw new \Exception('The "password" field is required.');
            }

            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

            TwigExample::create($data);

            header('Location: /twigexample');
            exit;
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) { // Error code for duplicate
                $this->logger->error('Error creating record: Duplicate email.');
                return $this->blade->run('twigexample.create', ['error' => 'This email already exists.']);
            } else {
                $this->logger->error('Error creating record: ' . $e->getMessage());
                echo 'Error creating record: ' . $e->getMessage();
            }
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $_POST;

            if (!isset($data['csrf_token']) || !$this->validateCsrfToken($data['csrf_token'])) {
                throw new \Exception('Invalid CSRF token.');
            }

            $data = Sanitizer::sanitizeInput($data);

            $twigexample = TwigExample::find($id);

            if (!$twigexample) {
                $this->logger->warning("Record with ID $id not found.");
                return "Record with ID $id not found.";
            }

            $twigexample->fill($data);
            $twigexample->save();

            $this->logger->info("Record with ID: $id updated successfully.");
            header('Location: /twigexample');
        } catch (\Exception $e) {
            $this->logger->error('Error updating the record: ' . $e->getMessage());
            return 'Error updating the record: ' . $e->getMessage();
        }
    }
}
