<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}Default Title{% endblock %}</title>

    <meta name="author" content="Marco Costa">
    <meta name="description" content="SysMVC - Framework PHP para desenvolvimento de websites e Apps.">
    <meta name="copyright" content="© 2025 Marco Costa" />
    <meta name="keywords" content="sites, web, desenvolvimento, framework, php, mit">
    <meta name="robots" content="index,nofollow">

    <!-- DataTables -->
    <link href="DataTables/datatables.min.css" rel="stylesheet"> 
    <script src="DataTables/datatables.min.js"></script>
    
    
    <!-- Link para o seu CSS personalizado -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/jumbotron.css" rel="stylesheet">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/">SysMVC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="/">Início</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/crudexample">Blade - Exemplo de CRUD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/twigexample">Twig - Exemplo de CRUD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/readme">Readme</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/about">Sobre</a>
            </li>
            <!-- Adicione mais links conforme necessário -->
        </ul>
    </div>
</nav>

    <div class="container my-4">
        {% block content %}{% endblock %} <!-- Conteúdo da página será inserido aqui -->
    </div>

    <footer class="bg-dark text-white text-center p-3">
        <p>© 2025 SysMVC PHP Framework | <a href="https://opensource.org/licenses/MIT" class="text-white" target="_blank">License: MIT</a></p>
    </footer>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/js/jquery.slim.min.js"><\/script>')</script><script src="../js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        console.log('jQuery is working');
        console.log('Bootstrap is working');
    });
    </script>

    <!-- Scripts de consentimento de cookies -->
    <link href="consent/cookieconsent.min.css" rel="stylesheet" type="text/css" />
    <script src="consent/cookieconsent.min.js"></script>
    <script>
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#216942",
                    "text": "#b2d192"
                },
                "button": {
                    "background": "#afed71"
                }
            },
            "content": {
                "message": "Utilizamos cookies essenciais e tecnologias semelhantes de acordo com nossos Termos de Uso. Ao continuar navegando, você concorda com estas condições.",
                "dismiss": "Aceitar",
                "href": "consent/termosdeuso.html"
            }
        });
    });
    </script>

</body>
</html>

