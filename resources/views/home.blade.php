@extends('layout')

@section('title', 'SysMVC - PHP Framework')

@section('content')
    <div class="jumbotron text-center">
        <h2>Welcome to SysMVC</h2>
        <p>PHP framework for website and app development.</p>
        <a href="/home/details" class="btn btn-primary">Learn More Details</a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="/images/1.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">Database Usage</h5>
                    <p class="card-text">Learn how to use the database in SysMVC with CRUD examples.</p>
                    <a href="/home/database" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="/images/2.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">Dependency Injection</h5>
                    <p class="card-text">Learn how to use dependency injection with PHP-DI in SysMVC.</p>
                    <a href="/home/dependency-injection" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="/images/3.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">App Projects</h5>
                    <p class="card-text">See how to use SysMVC as a base for application development.</p>
                    <a href="/home/app-development" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <!-- New Card: Blade Templates -->
        <div class="col-md-4">
            <div class="card">
                <img src="/images/4.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">Blade & Twig Templates Engine</h5>
                    <p class="card-text">Learn more about using Blade and/or Twig templates with SysMVC.</p>
                    <a href="/home/templates-blade" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
        

        <!-- New Card: Security -->
        <div class="col-md-4">
            <div class="card">
                <img src="/images/5.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">Security</h5>
                    <p class="card-text">Security implementations in SysMVC.</p>
                    <a href="/home/security" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>

        <!-- New Card: Console CLI -->
        <div class="col-md-4">
            <div class="card">
                <img src="/images/6.jpg" class="card-img-top" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">Console CLI</h5>
                    <p class="card-text">Use the CLI console to manage your SysMVC project.</p>
                    <a href="/home/console-cli" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
    </div>
@endsection
