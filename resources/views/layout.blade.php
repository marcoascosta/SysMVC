<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>

    <meta name="author" content="Marco Costa">
    <meta name="description" content="SysMVC - PHP framework for website and app development.">
    <meta name="copyright" content="© 2025 Marco Costa" />
    <meta name="keywords" content="sites, web, development, framework, php, mit">
    <meta name="robots" content="index,nofollow">

    <!-- DataTables -->
    <link href="DataTables/datatables.min.css" rel="stylesheet"> 
    <script src="DataTables/datatables.min.js"></script>
    
    
    <!-- Link to your custom CSS -->
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
                <a class="nav-link text-white" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/crudexample">Blade - CRUD Example</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/twigexample">Twig - CRUD Example</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/readme">Readme</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/about">About</a>
            </li>
            <!-- Add more links as needed -->
        </ul>
    </div>
</nav>

    <div class="container my-4">
        @yield('content') <!-- The page content will be inserted here -->
    </div>

    <footer class="bg-dark text-white text-center p-3">
        <p>© 2025 SysMVC PHP Framework | <a href="https://opensource.org/licenses/MIT" class="text-white" target="_blank">License: MIT</a></p>
    </footer>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/js/jquery.slim.min.js"><\/script>')</script><script src="../js/bootstrap.bundle.min.js"></script>


    <script>
    $(document).ready(function() {
        console.log('jQuery is working');
        console.log('Bootstrap is working');
    });
    </script>

    <!-- Cookie Consent Scripts -->
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
                "message": "We use essential cookies and similar technologies in accordance with our Terms of Use. By continuing to browse, you agree to these terms.",
                "dismiss": "Accept",
                "href": "consent/terms.html"
            }
        });
    });
    </script>

</body>
</html>
