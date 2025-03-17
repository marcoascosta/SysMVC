@extends('layout')

@section('title', 'Informações do Projeto')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 text-primary">SysMVC</h1>

    <br>

    <p>Github: <a href="https://github.com/marcoascosta/SysMVC.git">https://github.com/marcoascosta/SysMVC.git</a></p>

    <br><br>
    
    <p class="lead">Informações do Projeto</p>
    <p><strong>SysMVC</strong> é um sistema desenvolvido por <strong>Marco Costa</strong> (<a href="mailto:marcocosta@gmx.us">marcocosta@gmx.us</a>), com código-fonte licenciado sob a <strong>Licença MIT</strong>.</p>
    <p>Este software é oferecido de forma gratuita e pode ser utilizado, modificado e distribuído conforme os termos da Licença MIT.</p>
    <p>Site do projeto: <a href="https://sysmvc.syspanel.com.br">https://sysmvc.syspanel.com.br</a></p>
    <p>Se você deseja apoiar o desenvolvimento do SysMVC, considere fazer uma doação via PIX para <strong>marcocosta@gmx.us</strong>.</p>

    <hr>

    <h2 class="mt-4">🚀 Tutorial de Instalação</h2>

    <h3>✅ Pré-requisitos</h3>
    <ul>
        <li><strong>PHP 8.1</strong> ou superior</li>
        <li><strong>Composer</strong> (gerenciador de dependências para PHP)</li>
        <li><strong>Servidor Web</strong> (Apache ou Nginx)</li>
        <li><strong>MySQL</strong> ou outro banco de dados compatível</li>
    </ul>

    <h3>🔧 Passo a Passo</h3>

    <h4>1️⃣ Descompacte o Arquivo</h4>
    <p>Baixe e descompacte o arquivo do SysMVC para o seu ambiente local:</p>
    <pre><code>unzip sysmvc.zip -d sysmvc
cd sysmvc
    </code></pre>

    <h4>2️⃣ Instale as Dependências</h4>
    <p>Use o Composer para instalar as dependências do projeto:</p>
    <pre><code>composer install
    </code></pre>

    <h4>3️⃣ Configure o Ambiente</h4>
    <p>Copie o arquivo <code>.env.example</code> para <code>.env</code> e configure suas variáveis de ambiente:</p>
    <pre><code>cp .env.example .env
    </code></pre>

    <p>Abra o arquivo <code>.env</code> e edite as seguintes linhas com suas informações:</p>
    <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
    </code></pre>

    <h4>4️⃣ Ajuste as Permissões</h4>
    <p>Altere as permissões dos diretórios de armazenamento e cache para garantir que o servidor web possa gravar neles:</p>
    <pre><code>chmod -R 775 storage
chmod -R 775 bootstrap/cache
    </code></pre>

    <h4>5️⃣ Gere a Chave da Aplicação</h4>
    <pre><code>php bin/console generate:app-key
    </code></pre>

    <h4>6️⃣ Execute as Migrações</h4>
    <p>Execute as migrações para criar as tabelas no banco de dados:</p>
    <pre><code>php bin/console migrate:crudexample
    </code></pre>

    <h4>7️⃣ Configure o Servidor Web</h4>

    <h5>📌 Apache</h5>
    <p>Adicione a seguinte configuração ao seu arquivo de configuração do Apache:</p>
    <pre><code>&lt;VirtualHost *:80&gt;
    ServerName sysmvc.local
    DocumentRoot /caminho/para/sysmvc/public

    &lt;Directory /caminho/para/sysmvc/public&gt;
        AllowOverride All
        Require all granted
    &lt;/Directory&gt;
&lt;/VirtualHost&gt;
    </code></pre>

    <h5>📌 Nginx</h5>
    <p>Adicione a seguinte configuração ao seu arquivo de configuração do Nginx:</p>
    <pre><code>server {
    listen 80;
    server_name sysmvc.local;
    root /caminho/para/sysmvc/public;

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

    <h2 class="mt-4">📦 Dependências Utilizadas</h2>
    <p>O projeto utiliza os seguintes pacotes de terceiros, cada um com sua respectiva licença:</p>

    <h3>✅ Pacotes com Licença MIT</h3>
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

    <h2 class="mt-4">📜 Termos de Uso</h2>
    <p>Este projeto está licenciado sob a <strong>Licença MIT</strong>.</p>
    <p>Você pode usar, copiar, modificar, fundir, publicar, distribuir, sublicenciar ou vender cópias do Software, desde que a licença e a nota de copyright sejam incluídas em todas as cópias ou partes substanciais do Software.</p>
    <p>O Software é fornecido "no estado em que se encontra", sem garantias de qualquer tipo. Para mais detalhes, consulte a <a href="https://opensource.org/licenses/MIT">Licença MIT</a>.</p>
    <p>Para mais informações, entre em contato: <a href="mailto:marcocosta@gmx.us">marcocosta@gmx.us</a></p>

    <p class="text-center mt-5">© 2025 Marco Costa - Todos os direitos reservados sob a Licença MIT.</p>
</div>
@endsection

