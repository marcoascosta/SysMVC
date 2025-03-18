@extends('layout')

@section('title', 'Console CLI')

@section('content')
    <div class="container">
        <h2>Console CLI</h2>
        <p>The SysMVC CLI console, based on Symfony Console, allows you to efficiently manage your project using command-line commands.</p>
        
        <h3>Useful Commands</h3>
        <ul>
            <li><strong>php bin/console generate:app-key</strong> - Generates a new application key.</li>
            <li><strong>php bin/console make:controller ControllerName</strong> - Creates a new controller.</li>
            <li><strong>php bin/console make:model ModelName</strong> - Creates a new model.</li>
            <li><strong>php bin/console migrate: DatabaseTableName</strong> - Runs database migrations.</li>
        </ul>

        <h3>Extending with More Commands</h3>
        <p>The Symfony Console allows you to create and extend custom commands. Here is an example of how to create a custom command:</p>
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

        <p>To register the command, add it to the service in the <code>config/services.yaml</code> file:</p>
        <pre>
            <code>
                # config/services.yaml
                services:
                    App\Command\SayHelloCommand:
                        tags: ['console.command']
            </code>
        </pre>

        <p>Now you can execute the custom command:</p>
        <pre>
            <code>
                $ php bin/console app:say-hello
            </code>
        </pre>
        
        <p>For more information about available commands and how to create custom commands, check the <a href="https://symfony.com/doc/current/console.html" target="_blank">Symfony Console documentation</a>.</p>
    </div>


    <br><br>

    <p>Github: <a href="https://github.com/marcoascosta/SysMVC.git">https://github.com/marcoascosta/SysMVC.git</a></p>

    <br><br>

    <h2 class="mt-4">Contact</h2>
    <p>If you're interested in SysMVC, get in touch:</p>
    <ul>
        <li>Email: <a href="mailto:marcocosta@gmx.us">marcocosta@gmx.us</a></li>
        <li>WhatsApp: <a href="https://wa.me/5535992261684" target="_blank">+55 (35) 99226-1684</a></li>
    </ul>

    <br>
    <h2 class="mt-4">Donations via PIX</h2>
    <p>If you'd like to support the development of SysMVC, consider making a donation via PIX to <strong>marcocosta@gmx.us</strong>.</p>
@endsection
