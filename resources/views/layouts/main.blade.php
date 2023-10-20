<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body class="container">
        <div class="admin">
            <div class="admin-aculto"><h1>Olá, Administrador</h1></div>
            <div class="admin-aculto">
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"><ion-icon name="log-out" style="font-size: 3rem;"></ion-icon></button>
            </form>
        </div>
        </div>
        <header class="main-header">
                <div>
                <div class="item">
                    <a href="/pessoas" class="{{ request()->is('pessoas') ? 'active' : '' }}">
                    <ion-icon name="person-add-outline" style="font-size: 3rem;"></ion-icon>
                    </a>
                    <p>Cadastro</p>
                </div>
                    <div class = "item">
                        <a href="/produtos" class="{{ request()->is('produtos') ? 'active' : '' }}"><ion-icon name="cube-outline" style="font-size: 3rem;"></ion-icon></a>
                        <p>Estoque</p>
                    </div>
                    <div class = "item">
                        <a href="/fornecedores" class="{{ request()->is('fornecedores') ? 'active' : '' }}"><ion-icon name="subway-outline" style="font-size: 3rem;"></ion-icon></a>
                        <p>Fornecedor</p>
                    </div>
                    <div class = "item">
                        <a href="/vendas" class="{{ request()->is('vendas') ? 'active' : '' }}"><ion-icon name="bag-remove-outline" style="font-size: 3rem;"></ion-icon></a>
                        <p>Vendas</p>
                    </div>
                    
                </div>
        </header>

        @yield('content')
       <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    </body>
</html>
