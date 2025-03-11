@extends('layout')

@section('title', 'Uso de Banco de Dados')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 text-primary">Uso de Banco de Dados</h1>
    <p class="lead">Exemplo de CRUD com SysMVC.</p>
    
    <p>O SysMVC facilita a interação com bancos de dados através do uso do Eloquent ORM. Você pode facilmente criar, ler, atualizar e deletar registros no banco de dados usando métodos intuitivos.</p>
    
    <h2>Exemplo de CRUD</h2>
    <p>Abaixo está um exemplo básico de operações CRUD:</p>
    
    <h3>Criação de um Registro</h3>
    <pre><code>
$client = new Client();
$client->name = 'Nome do Cliente';
$client->email = 'email@exemplo.com';
$client->save();
    </code></pre>
    
    <h3>Leitura de Registros</h3>
    <pre><code>
$clients = Client::all();
foreach ($clients as $client) {
    echo $client->name;
}
    </code></pre>
    
    <h3>Atualização de um Registro</h3>
    <pre><code>
$client = Client::find(1);
$client->name = 'Novo Nome';
$client->save();
    </code></pre>
    
    <h3>Exclusão de um Registro</h3>
    <pre><code>
$client = Client::find(1);
$client->delete();
    </code></pre>
    
    <p>Com esses exemplos, você pode ver como é fácil trabalhar com bancos de dados usando o SysMVC.</p>
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
