@extends('layout')

@section('title', 'Desenvolvimento de Apps com SysMVC')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 text-primary">Projetos de Apps com SysMVC</h1>
    <p class="lead">Como usar o SysMVC como base para o desenvolvimento de aplicações.</p>
    
    <p>O SysMVC é um framework flexível e poderoso, perfeito para servir como base para o desenvolvimento de aplicações web modernas.</p>
    
    <h2>Estrutura Modular</h2>
    <p>O SysMVC permite a criação de módulos independentes, facilitando a organização do seu código e a manutenção do projeto.</p>
    
    <h2>Roteamento Simples</h2>
    <p>Com o roteador do SysMVC, você pode definir suas rotas de forma simples e intuitiva:</p>
    <pre><code>
Router::get('/home', 'HomeController@index');
Router::post('/client', 'ClientController@store');
    </code></pre>
    
    <h2>Renderização de Templates</h2>
    <p>Utilize o BladeOne para renderizar seus templates de forma eficiente e organizada:</p>
    <pre><code>
echo $blade->run("home.index", ["clients" => $clients]);
    </code></pre>
    
    <p>Com essas ferramentas, o SysMVC proporciona uma base sólida para o desenvolvimento de aplicações web robustas e escaláveis.</p>

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
