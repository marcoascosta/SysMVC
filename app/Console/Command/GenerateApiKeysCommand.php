<?php

namespace App\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Dotenv\Dotenv;

class GenerateApiKeysCommand extends Command
{
    protected static $defaultName = 'generate:api-keys';

    protected function configure()
    {
        $this->setDescription('Generates API keys and writes them to the .env file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Generate random API keys
        $publicKey = bin2hex(random_bytes(16));  // Generates a random public key
        $secretKey = bin2hex(random_bytes(32));  // Generates a random secret key

        // Output to terminal
        $output->writeln("Public Key: $publicKey");
        $output->writeln("Secret Key: $secretKey");

        // Path to the .env file
        $envFilePath = __DIR__ . '/../../../.env';

        // Check if the .env file exists
        if (!file_exists($envFilePath)) {
            $output->writeln("<error>.env file not found!</error>");
            return Command::FAILURE;
        }

        // Read the contents of the .env file
        $envFile = file_get_contents($envFilePath);

        // Check if the keys already exist in the .env file
        if (strpos($envFile, 'API_PUBLIC_KEY=') === false) {
            // Add the public key
            $envFile .= "\nAPI_PUBLIC_KEY=$publicKey";
        } else {
            // Replace the existing public key
            $envFile = preg_replace('/^API_PUBLIC_KEY=.*$/m', "API_PUBLIC_KEY=$publicKey", $envFile);
        }

        if (strpos($envFile, 'API_SECRET_KEY=') === false) {
            // Add the secret key
            $envFile .= "\nAPI_SECRET_KEY=$secretKey";
        } else {
            // Replace the existing secret key
            $envFile = preg_replace('/^API_SECRET_KEY=.*$/m', "API_SECRET_KEY=$secretKey", $envFile);
        }

        // Write to the .env file
        file_put_contents($envFilePath, $envFile);

        $output->writeln("API keys have been written to the .env file");

        return Command::SUCCESS;
    }
}
