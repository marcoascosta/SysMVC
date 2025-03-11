@extends('layout')

@section('title', 'Injeção de Dependência com PHP-DI')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 text-primary">Injeção de Dependência com PHP-DI</h1>
    <p class="lead">Como utilizar o PHP-DI no SysMVC.</p>
    
    <p>O SysMVC utiliza a biblioteca PHP-DI para gerenciar a injeção de dependências. Isso permite que você escreva código mais modular e testável.</p>
    
    <h2>Configuração Básica</h2>
    <p>Para configurar o PHP-DI, você pode criar um arquivo <code>di-config.php</code> com as definições das suas dependências:</p>
    <pre><code>{{ 
'   use DI\ContainerBuilder;

    return function (ContainerBuilder $containerBuilder) {
        $containerBuilder->addDefinitions([
            // Defina suas dependências aqui
            ClientRepository::class => \DI\create(MySqlClientRepository::class),
        ]);
    };' 
}}</code></pre>

    <h2>Utilização</h2>
    <p>Para utilizar a injeção de dependências em suas classes, basta passar as dependências pelo construtor:</p>
    <pre><code>{{ 
'   class ClientService {
        private $clientRepository;
        
        public function __construct(ClientRepository $clientRepository) {
            $this->clientRepository = $clientRepository;
        }
        
        public function getClients() {
            return $this->clientRepository->findAll();
        }
    }' 
}}</code></pre>
    
    <p>Com a injeção de dependências, você pode facilmente trocar implementações e manter seu código desacoplado e mais fácil de testar.</p>

    <br><br>

    <h2 class="mt-4">Contato</h2>
    <p>Se você estiver interessado no SysMVC, entre em contato:</p>
    <ul>
        <li>Email: <a href="mailto:marcocosta@gmx.us">marcocosta@gmx.us</a></li>
        <li>WhatsApp: <a href="https://wa.me/5535992261684" target="_blank">+55 (35) 99226-1684</a></li>
    </ul>

    <p>Se você deseja apoiar o desenvolvimento do SysMVC, considere fazer uma doação via PIX para <b>marcocosta@gmx.us</b></p>
</div>
@endsection

