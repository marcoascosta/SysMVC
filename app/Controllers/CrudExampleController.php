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
            $this->logger->info('Displaying the CrudExampleController page.');

            if ($crudexample->isEmpty()) {
                $this->logger->warning('No records found in the database.');
                return 'No records found in the database.';
            }

            $crudexample = Sanitizer::sanitizeOutput($crudexample->toArray());

            return $this->blade->run('crudexample.index', ['crudexample' => $crudexample]);

        } catch (\Exception $e) {
            $this->logger->error('Error when querying the database: ' . $e->getMessage());
            return 'Error when querying the database: ' . $e->getMessage();
        }
    }

    public function edit(Request $request, $id): string
    {
        try {
            $this->logger->info('Editing record with ID: ' . $id);
            $crudexample = CrudExample::find($id);
            if (!$crudexample) {
                return 'Record not found';
            }

            $csrfToken = generateCsrfToken();
            $crudexample = Sanitizer::sanitizeOutput($crudexample->toArray());

            return $this->blade->run('crudexample.edit', ['crudexample' => $crudexample, 'csrfToken' => $csrfToken]);
        } catch (\Exception $e) {
            $this->logger->error('Error when displaying the edit page: ' . $e->getMessage());
            return 'Error when displaying the edit page: ' . $e->getMessage();
        }
    }

    public function create(): string
    {
        try {
            return $this->blade->run('crudexample.create', ['error' => null]);
        } catch (\Exception $e) {
            $this->logger->error('Error when displaying the create page: ' . $e->getMessage());
            return 'Error when displaying the create page: ' . $e->getMessage();
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

            CrudExample::create($data);

            header('Location: /crudexample');
            exit;
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) { // Error code for duplicate
                $this->logger->error('Error when creating record: Duplicate email.');
                return $this->blade->run('crudexample.create', ['error' => 'This email already exists.']);
            } else {
                $this->logger->error('Error when creating record: ' . $e->getMessage());
                echo 'Error when creating record: ' . $e->getMessage();
            }
        }
    }

    public function update($id)
    {
        try {
            $data = $_POST;

            if (!isset($data['csrf_token']) || !$this->validateCsrfToken($data['csrf_token'])) {
                throw new \Exception('Invalid CSRF token.');
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
            $this->logger->error('Error when updating record: ' . $e->getMessage());
            echo 'Error when updating record: ' . $e->getMessage();
        }
    }

    public function show(Request $request, $id): string
    {
        try {
            $crudexample = CrudExample::find($id);
            if (!$crudexample) {
                return 'Record not found';
            }

            $crudexample = Sanitizer::sanitizeOutput($crudexample->toArray());

            return $this->blade->run('crudexample.show', ['crudexample' => $crudexample]);
        } catch (\Exception $e) {
            $this->logger->error('Error when displaying record details: ' . $e->getMessage());
            return 'Error when displaying record details: ' . $e->getMessage();
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $this->logger->info('Deleting record with ID: ' . $id);
            $crudexample = CrudExample::find($id);
            if ($crudexample) {
                $crudexample->delete();
            }

            header('Location: /crudexample');
            exit;
        } catch (\Exception $e) {
            $this->logger->error('Error when deleting record: ' . $e->getMessage());
            echo 'Error when deleting record: ' . $e->getMessage();
        }
    }
}
