@extends('layout')

@section('title', 'SysMVC - PHP Framework')

@section('content')
    <div class="jumbotron text-center">
        <h2>Bem-vindo ao SysMVC</h2>
        <p>Framework PHP para desenvolvimento de websites e apps.</p>
        <a href="/home/details" class="btn btn-primary">Conheça Mais Detalhes</a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="/images/1.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">Uso de Banco de Dados</h5>
                    <p class="card-text">Saiba como utilizar o banco de dados no SysMVC com exemplos de CRUD.</p>
                    <a href="/home/database" class="btn btn-primary">Ver Mais</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="/images/2.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">Injeção de Dependência</h5>
                    <p class="card-text">Aprenda a utilizar a injeção de dependências com PHP-DI no SysMVC.</p>
                    <a href="/home/dependency-injection" class="btn btn-primary">Ver Mais</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="/images/3.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">Projetos de Apps</h5>
                    <p class="card-text">Veja como utilizar o SysMVC como base para o desenvolvimento de aplicações.</p>
                    <a href="/home/app-development" class="btn btn-primary">Ver Mais</a>
                </div>
            </div>
        </div>
    </div>

    <br>


    <div class="row">
        <!-- Novo Card: Templates Blade -->
        <div class="col-md-4">
            <div class="card">
                <img src="/images/4.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">Blade & Twig Templates Engine</h5>
                    <p class="card-text">Saiba mais sobre a utilização de templates Blade e/ou Twig com SysMVC.</p>
                    <a href="/home/templates-blade" class="btn btn-primary">Ver Mais</a>
                </div>
            </div>
        </div>
        

        <!-- Novo Card: Segurança -->
        <div class="col-md-4">
            <div class="card">
                <img src="/images/5.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">Segurança</h5>
                    <p class="card-text">Implementações de segurança no SysMVC.</p>
                    <a href="/home/security" class="btn btn-primary">Ver Mais</a>
                </div>
            </div>
        </div>

        <!-- Novo Card: Console CLI -->
        <div class="col-md-4">
            <div class="card">
                <img src="/images/6.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">Console CLI</h5>
                    <p class="card-text">Utilize o console CLI para gerenciar seu projeto SysMVC.</p>
                    <a href="/home/console-cli" class="btn btn-primary">Ver Mais</a>
                </div>
            </div>
        </div>
    </div>
@endsection
