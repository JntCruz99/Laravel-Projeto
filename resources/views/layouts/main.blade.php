<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/script.js"></script>
    </head>
    <body class="container">
        <header class="main-header">
                <div>
                <div class="item">
                    <a href="/pessoas" class="{{ request()->is('pessoas') ? 'active' : '' }}">
                    <ion-icon name="person-add-outline" style="font-size: 3rem;"></ion-icon>
                    </a>
                    <p>Cadastro</p>
                </div>
                    <div class = "item">
                        <a href=""><ion-icon name="cube-outline" style="font-size: 3rem;"></ion-icon></a>
                        <p>Estoque</p>
                    </div>
                    <div class = "item">
                        <a href=""><ion-icon name="subway-outline" style="font-size: 3rem;"></ion-icon></a>
                        <p>Fornecedor</p>
                    </div>
                    <div class = "item">
                        <a href=""><ion-icon name="bag-remove-outline" style="font-size: 3rem;"></ion-icon></a>
                        <p>Vendas</p>
                    </div>
                    
                </div>
        </header>
        @yield('content')
       <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
