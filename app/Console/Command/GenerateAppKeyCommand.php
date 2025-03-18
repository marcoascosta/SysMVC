<?php

namespace App\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Dotenv\Dotenv;

class GenerateAppKeyCommand extends Command
{
    protected static $defaultName = 'generate:app-key';

    protected function configure()
    {
        $this->setDescription('Generates an application key and writes it to the .env file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Generate random key
        $appKey = bin2hex(random_bytes(32));  // Generates a 64-character key (32 bytes)
        
        // Output to terminal
        $output->writeln("Generated Key: $appKey");

        // Load the .env
        $dotenv = new Dotenv();
        $envFilePath = __DIR__ . '/../../../.env';  // Adjust the path as needed
        if (!file_exists($envFilePath)) {
            $output->writeln(".env file not found!");
            return Command::FAILURE;
        }

        // Read the content of the .env file
        $envFile = file_get_contents($envFilePath);
        
        // Replace the APP_KEY or add it if it doesn't exist
        if (strpos($envFile, 'APP_KEY=') !== false) {
            // If a line with APP_KEY already exists, replace it
            $envFile = preg_replace('/^APP_KEY=.*$/m', "APP_KEY=$appKey", $envFile);
        } else {
            // Otherwise, add it at the end
            $envFile .= "\nAPP_KEY=$appKey\n";
        }

        // Write the new content to the .env file
        file_put_contents($envFilePath, $envFile);

        $output->writeln("The application key has been written to the .env file");

        return Command::SUCCESS;
    }
}
