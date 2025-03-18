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
        $this->setDescription('Migrates the database by creating the crudexample table and adding fake records for testing.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Load the variables from the .env file
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

        // Set Capsule as the global Eloquent ORM manager
        $capsule->setAsGlobal();

        // Boot Eloquent ORM
        $capsule->bootEloquent();

        // Check if the crudexample table already exists
        if (Capsule::schema()->hasTable('crudexample')) {
            $output->writeln('The "crudexample" table already exists. No action needed.');
            return Command::SUCCESS;
        }

        // Create the crudexample table
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

        // Generate 30 fake records
        $faker = Faker::create();
        for ($i = 0; $i < 30; $i++) {
            Capsule::table('crudexample')->insert([
                'company' => $faker->company,
                'name' => $faker->name,
                'password' => password_hash('password', PASSWORD_BCRYPT), // Default password for testing
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'notes' => $faker->sentence,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $output->writeln('Migration of the "crudexample" table and insertion of fake records for example completed successfully.');

        return Command::SUCCESS;
    }
}
