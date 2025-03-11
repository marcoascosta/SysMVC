<?php

namespace App\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Dotenv\Dotenv;
use Faker\Factory as Faker;

class MigrateCrudExampleCommand extends Command
{
    protected static $defaultName = 'migrate:crudexample';

    protected function configure()
    {
        $this->setDescription('Migra o banco de dados criando a tabela crudexample e adicionando registros falsos para teste.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Carregar as variáveis do .env
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../../../.env');

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => $_ENV['DB_CONNECTION'],
            'host'      => $_ENV['DB_HOST'],
            'database'  => $_ENV['DB_DATABASE'],
            'username'  => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        // Seta o Capsule como gerenciador global de Eloquent ORM
        $capsule->setAsGlobal();

        // Inicia o Eloquent ORM
        $capsule->bootEloquent();

        // Verificar se a tabela crudexample já existe
        if (Capsule::schema()->hasTable('crudexample')) {
            $output->writeln('A tabela "crudexample" já existe. Nenhuma ação necessária.');
            return Command::SUCCESS;
        }

        // Criar a tabela crudexample
        $capsule->schema()->create('crudexample', function ($table) {
            $table->increments('id');
            $table->string('company', 50);
            $table->string('name', 50);
            $table->string('password', 255);
            $table->string('email', 100)->unique();
            $table->string('address', 50);
            $table->string('phone', 50);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // Gerar 100 registros falsos
        $faker = Faker::create();
        for ($i = 0; $i < 30; $i++) {
            Capsule::table('crudexample')->insert([
                'company' => $faker->company,
                'name' => $faker->name,
                'password' => password_hash('password', PASSWORD_BCRYPT), // Senha padrão para testes
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'notes' => $faker->sentence,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $output->writeln('Migração da tabela "crudexample" e inserção de registros fakes para exemplo concluídas com sucesso.');

        return Command::SUCCESS;
    }
}
