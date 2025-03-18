@extends('layout')

@section('title', 'Project Information')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 text-primary">SysMVC</h1>

    <br>

    <p>Github: <a href="https://github.com/marcoascosta/SysMVC.git">https://github.com/marcoascosta/SysMVC.git</a></p>

    <br><br>
    
    <p class="lead">Project Information</p>
    <p><strong>SysMVC</strong> is a system developed by <strong>Marco Costa</strong> (<a href="mailto:marcocosta@gmx.us">marcocosta@gmx.us</a>), with source code licensed under the <strong>MIT License</strong>.</p>
    <p>This software is offered for free and can be used, modified, and distributed under the terms of the MIT License.</p>
    <p>Project website: <a href="https://sysmvc.syspanel.com.br">https://sysmvc.syspanel.com.br</a></p>
    <p>If you wish to support the development of SysMVC, consider making a donation via PIX to <strong>marcocosta@gmx.us</strong>.</p>

    <hr>

    <h2 class="mt-4">🚀 Installation Tutorial</h2>

    <h3>✅ Prerequisites</h3>
    <ul>
        <li><strong>PHP 8.1</strong> or higher</li>
        <li><strong>Composer</strong> (dependency manager for PHP)</li>
        <li><strong>Web Server</strong> (Apache or Nginx)</li>
        <li><strong>MySQL</strong> or other compatible database</li>
    </ul>

    <h3>🔧 Step-by-Step</h3>

    <h4>1️⃣ Unzip the File</h4>
    <p>Download and unzip the SysMVC file to your local environment:</p>
    <pre><code>unzip sysmvc.zip -d sysmvc
cd sysmvc
    </code></pre>

    <h4>2️⃣ Install the Dependencies</h4>
    <p>Use Composer to install the project dependencies:</p>
    <pre><code>composer install
    </code></pre>

    <h4>3️⃣ Configure the Environment</h4>
    <p>Copy the <code>.env.example</code> file to <code>.env</code> and configure your environment variables:</p>
    <pre><code>cp .env.example .env
    </code></pre>

    <p>Open the <code>.env</code> file and edit the following lines with your information:</p>
    <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
    </code></pre>

    <h4>4️⃣ Set Permissions</h4>
    <p>Change the permissions of the storage and cache directories to ensure the web server can write to them:</p>
    <pre><code>chmod -R 775 storage
chmod -R 775 bootstrap/cache
    </code></pre>

    <h4>5️⃣ Generate the Application Key</h4>
    <pre><code>php bin/console generate:app-key
    </code></pre>

    <h4>6️⃣ Run the Migrations</h4>
    <p>Run the migrations to create the tables in the database:</p>
    <pre><code>php bin/console migrate:crudexample
    </code></pre>

    <h4>7️⃣ Configure the Web Server</h4>

    <h5>📌 Apache</h5>
    <p>Add the following configuration to your Apache configuration file:</p>
    <pre><code>&lt;VirtualHost *:80&gt;
    ServerName sysmvc.local
    DocumentRoot /path/to/sysmvc/public

    &lt;Directory /path/to/sysmvc/public&gt;
        AllowOverride All
        Require all granted
    &lt;/Directory&gt;
&lt;/VirtualHost&gt;
    </code></pre>

    <h5>📌 Nginx</h5>
    <p>Add the following configuration to your Nginx configuration file:</p>
    <pre><code>server {
    listen 80;
    server_name sysmvc.local;
    root /path/to/sysmvc/public;

    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    }
}
    </code></pre>

    <hr>

    <h2 class="mt-4">📦 Dependencies Used</h2>
    <p>The project uses the following third-party packages, each with its respective license:</p>

    <h3>✅ Packages with MIT License</h3>
    <ul>
        <li><strong>Illuminate Database</strong> → <a href="https://github.com/illuminate/database">illuminate/database</a></li>
        <li><strong>Monolog</strong> → <a href="https://github.com/Seldaek/monolog">monolog/monolog</a></li>
        <li><strong>BladeOne</strong> → <a href="https://github.com/EFTEC/BladeOne">eftec/bladeone</a></li>
        <li><strong>Twig</strong> → <a href="https://github.com/twigphp/Twig">twig/twig</a></li>
        <li><strong>Symfony Console</strong> → <a href="https://github.com/symfony/console">symfony/console</a></li>
        <li><strong>Phinx</strong> → <a href="https://github.com/cakephp/phinx">robmorgan/phinx</a></li>
        <li><strong>Defuse Encryption</strong> → <a href="https://github.com/defuse/php-encryption">defuse/php-encryption</a></li>
        <li><strong>Random Compatibility</strong> → <a href="https://github.com/paragonie/random_compat">paragonie/random_compat</a></li>
        <li><strong>Rakit Validation</strong> → <a href="https://github.com/rakit/validation">rakit/validation</a></li>
        <li><strong>Carbon</strong> → <a href="https://github.com/briannesbitt/Carbon">nesbot/carbon</a></li>
        <li><strong>Flysystem</strong> → <a href="https://github.com/thephpleague/flysystem">league/flysystem</a></li>
        <li><strong>Intervention Image</strong> → <a href="https://github.com/Intervention/image">intervention/image</a></li>
        <li><strong>Symfony Cache</strong> → <a href="https://github.com/symfony/cache">symfony/cache</a></li>
        <li><strong>Predis Redis Client</strong> → <a href="https://github.com/predis/predis">predis/predis</a></li>
        <li><strong>PHP Dependency Injection</strong> → <a href="https://github.com/PHP-DI/PHP-DI">php-di/php-di</a></li>
        <li><strong>Symfony Dotenv</strong> → <a href="https://github.com/symfony/dotenv">symfony/dotenv</a></li>        
        <li><strong>Pecee SimpleRouter</strong> → <a href="https://github.com/pecee/pecee-simple-router">pecee/simple-router</a></li>
        <li><strong>Nyholm PSR7</strong> → <a href="https://github.com/Nyholm/psr7">nyholm/psr7</a></li>  
        <li><strong>FakerPHP Faker</strong> → <a href="https://github.com/FakerPHP/Faker">fakerphp/faker</a></li>    
        <li><strong>Symfony Mailer</strong> → <a href="https://github.com/symfony/mailer">symfony/mailer</a></li>
    </ul>

    <hr>

    <h2 class="mt-4">📜 Terms of Use</h2>
    <p>This project is licensed under the <strong>MIT License</strong>.</p>
    <p>You can use, copy, modify, merge, publish, distribute, sublicense, or sell copies of the Software, provided that the license and copyright notice are included in all copies or substantial portions of the Software.</p>
    <p>The Software is provided "as is", without any warranty of any kind. For more details, please consult the <a href="https://opensource.org/licenses/MIT">MIT License</a>.</p>
    <p>For more information, contact: <a href="mailto:marcocosta@gmx.us">marcocosta@gmx.us</a></p>

    <p class="text-center mt-5">© 2025 Marco Costa - All rights reserved under the MIT License.</p>
</div>
@endsection
