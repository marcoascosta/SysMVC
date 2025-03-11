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
        $this->setDescription('Gera uma chave de aplicação e grava no arquivo .env');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Gerar chave aleatória
        $appKey = bin2hex(random_bytes(32));  // Gera uma chave de 64 caracteres (32 bytes)
        
        // Output para o terminal
        $output->writeln("Chave gerada: $appKey");

        // Carregar o .env
        $dotenv = new Dotenv();
        $envFilePath = __DIR__ . '/../../../.env';  // Ajuste o caminho conforme necessário
        if (!file_exists($envFilePath)) {
            $output->writeln("Arquivo .env não encontrado!");
            return Command::FAILURE;
        }

        // Lê o conteúdo do arquivo .env
        $envFile = file_get_contents($envFilePath);
        
        // Substitui a chave APP_KEY ou adiciona se não existir
        if (strpos($envFile, 'APP_KEY=') !== false) {
            // Se já existir uma linha com APP_KEY, substitui
            $envFile = preg_replace('/^APP_KEY=.*$/m', "APP_KEY=$appKey", $envFile);
        } else {
            // Caso contrário, adiciona no final
            $envFile .= "\nAPP_KEY=$appKey\n";
        }

        // Grava o novo conteúdo no arquivo .env
        file_put_contents($envFilePath, $envFile);

        $output->writeln("A chave de aplicação foi gravada no arquivo .env");

        return Command::SUCCESS;
    }
}
