<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo asset('css/app.css') ?>">
    <title>Policy Leads - Rodrigo Reynoso Application</title>
</head>
<body>
    @if(count($articles)>=1)
<ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="#">
                <img src="https://www.policylead.eu/wp-content/uploads/2020/05/logo-policylead.svg" class="img-fluid" width="200px" alt="">
            </a>
        </li>
        <li class="nav-item rodrigo">
            <h4>
                Rodrigo Reynoso Application
            </h4>
        </li>
</ul>
@yield('main')


 
<footer class="flex">
    <img src="https://www.policylead.eu/wp-content/uploads/2020/05/logo-policylead.svg" class="img-fluid" width="200px" alt="">
</footer>
@else
    <h1 class="advice">RUN  FIRST IN YOUR LARAVEL CONSOLE <br> "PHP ARTISAN SCRAPER:SPIEGEL-POLITIKS"</h1>
@endif
</body>
</html>