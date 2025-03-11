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
        $this->setDescription('Gera chaves de API e escreve no arquivo .env');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Gerar chaves de API aleatórias
        $publicKey = bin2hex(random_bytes(16));  // Gera uma chave pública aleatória
        $secretKey = bin2hex(random_bytes(32));  // Gera uma chave secreta aleatória

        // Output para o terminal
        $output->writeln("Chave Pública: $publicKey");
        $output->writeln("Chave Secreta: $secretKey");

        // Caminho para o arquivo .env
        $envFilePath = __DIR__ . '/../../../.env';

        // Verifica se o arquivo .env existe
        if (!file_exists($envFilePath)) {
            $output->writeln("<error>Arquivo .env não encontrado!</error>");
            return Command::FAILURE;
        }

        // Lê o conteúdo do arquivo .env
        $envFile = file_get_contents($envFilePath);

        // Verifica se as chaves já existem no arquivo .env
        if (strpos($envFile, 'API_PUBLIC_KEY=') === false) {
            // Adiciona a chave pública
            $envFile .= "\nAPI_PUBLIC_KEY=$publicKey";
        } else {
            // Substitui a chave pública existente
            $envFile = preg_replace('/^API_PUBLIC_KEY=.*$/m', "API_PUBLIC_KEY=$publicKey", $envFile);
        }

        if (strpos($envFile, 'API_SECRET_KEY=') === false) {
            // Adiciona a chave secreta
            $envFile .= "\nAPI_SECRET_KEY=$secretKey";
        } else {
            // Substitui a chave secreta existente
            $envFile = preg_replace('/^API_SECRET_KEY=.*$/m', "API_SECRET_KEY=$secretKey", $envFile);
        }

        // Escreve no arquivo .env
        file_put_contents($envFilePath, $envFile);

        $output->writeln("As chaves de API foram escritas no .env");

        return Command::SUCCESS;
    }
}
