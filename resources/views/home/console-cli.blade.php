@extends('layout')

@section('title', 'Console CLI')

@section('content')
    <div class="container">
        <h2>Console CLI</h2>
        <p>O console CLI do SysMVC, baseado no Symfony Console, permite que você gerencie seu projeto de forma eficiente usando comandos de linha de comando.</p>
        
        <h3>Comandos Úteis</h3>
        <ul>
            <li><strong>php bin/console generate:app-key</strong> - Gera uma nova chave de aplicação.</li>
            <li><strong>php bin/console make:controller NomeController</strong> - Cria um novo controlador.</li>
            <li><strong>php bin/console make:model NomeModel</strong> - Cria um novo modelo.</li>
            <li><strong>php bin/console migrate: Nome da Tabela do Banco de Dados</strong> - Executa as migrações do banco de dados.</li>
        </ul>

        <h3>Expansão com Mais Comandos</h3>
        <p>O Symfony Console permite que você crie e expanda comandos personalizados. Aqui está um exemplo de como criar um comando personalizado:</p>
        <pre>
            <code>
                // src/Command/SayHelloCommand.php
                namespace App\Command;

                use Symfony\Component\Console\Command\Command;
                use Symfony\Component\Console\Input\InputInterface;
                use Symfony\Component\Console\Output\OutputInterface;

                class SayHelloCommand extends Command
                {
                    protected static $defaultName = 'app:say-hello';

                    protected function configure()
                    {
                        $this
                            ->setDescription('Says hello.')
                            ->setHelp('This command allows you to say hello...');
                    }

                    protected function execute(InputInterface $input, OutputInterface $output)
                    {
                        $output->writeln('Hello from SysMVC!');
                        return Command::SUCCESS;
                    }
                }
            </code>
        </pre>

        <p>Para registrar o comando, adicione-o ao serviço no arquivo <code>config/services.yaml</code>:</p>
        <pre>
            <code>
                # config/services.yaml
                services:
                    App\Command\SayHelloCommand:
                        tags: ['console.command']
            </code>
        </pre>

        <p>Com isso, você pode executar o comando personalizado:</p>
        <pre>
            <code>
                $ php bin/console app:say-hello
            </code>
        </pre>
        
        <p>Para mais informações sobre os comandos disponíveis e como criar comandos personalizados, consulte a <a href="https://symfony.com/doc/current/console.html" target="_blank">documentação do Symfony Console</a>.</p>
    </div>


    <br><br>

    <p>Github: <a href="https://github.com/marcoascosta/SysMVC.git">https://github.com/marcoascosta/SysMVC.git</a></p>

    <br><br>

    <h2 class="mt-4">Contato</h2>
    <p>Se você estiver interessado no SysMVC, entre em contato:</p>
    <ul>
        <li>Email: <a href="mailto:marcocosta@gmx.us">marcocosta@gmx.us</a></li>
        <li>WhatsApp: <a href="https://wa.me/5535992261684" target="_blank">+55 (35) 99226-1684</a></li>
    </ul>

    <br>
    <h2 class="mt-4">Doações via PIX</h2>
    <p>Se você deseja apoiar o desenvolvimento do SysMVC, considere fazer uma doação via PIX para <strong>marcocosta@gmx.us</strong>.</p>



@endsection

