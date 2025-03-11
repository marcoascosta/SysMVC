@extends('layout')

@section('title', 'Segurança')

@section('content')
    <div class="container">
        <h2>Segurança</h2>
        <p>Implementamos várias medidas de segurança no SysMVC para proteger sua aplicação contra ameaças. Aqui estão algumas das implementações:</p>
        <h3>Proteção CSRF</h3>
        <p>Usamos tokens CSRF para proteger contra ataques de Cross-Site Request Forgery.</p>
        <h3>Sanitização de Dados</h3>
        <p>Todos os dados de entrada e saída são sanitizados para evitar injeções de código e outros ataques.</p>        
        <h3>Cabeçalhos de Segurança</h3>
        <p>Adicionamos cabeçalhos de segurança HTTP para proteger contra ataques como clickjacking e MIME-type sniffing.</p>
        <p>Para mais informações sobre segurança, consulte a <a href="https://owasp.org/" target="_blank">documentação da OWASP</a>.</p>
    </div>

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
