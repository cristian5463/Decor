<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="/css/toastr.min.css">
    <link rel="stylesheet" href="/css/all.css">
    <title><?= isset($titulo) ? $titulo : 'Meu Sistema' ?></title>
    <style>
        .promo {
            color: red;
            display: block;
            text-decoration: line-through;
        }

        .promo_por {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Meu Sistema</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarCliente" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clientes
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarCliente">
                        <a class="dropdown-item" href="/cliente/listar"><i class="fas fa-search"></i> Ver todos</a>
                        <a class="dropdown-item" href="/cliente/create"><i class="fas fa-plus"></i> Adicionar</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarProduto" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produtos
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarProduto">
                        <a class="dropdown-item" href="/produto/listar"><i class="fas fa-search"></i> Ver todos</a>
                        <a class="dropdown-item" href="/produto/create"><i class="fas fa-plus"></i> Adicionar</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>