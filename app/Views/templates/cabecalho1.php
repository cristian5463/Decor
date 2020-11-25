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
        body {
            background-color: #f9fafc;
        }

        /*CSS BOTÃO DE BUSCA*/
        

        #campo_busca {
            padding-left: 10px;
            border: 1px solid;
            border-radius: 5px 0px 0px 5px;
            color: #C0C0C0;
            height: 48px;
            width: 22rem;
            float: left;
        }

        .buscar_produto {
            border: 0px solid;
            border-radius: 0px 5px 5px 0px;
            color: white;
            height: 48px;
            width: 45px;
            float: left;
            background-color: #9d29b2;
            color: #ffffff;
        }

        .promo {
            color: red;
            display: block;
            text-decoration: line-through;
        }

        .promo_por {
            color: green;
            font-weight: bold;
        }

        .sidenav {
            height: 100%;
            width: 14rem;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #e9e9e9;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 16px;
            color: #e9e9e9;
            display: block;
        }

        .sidenav a,
        .dropdown-btn {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 16px;
            color: #545454;
            display: block;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }

        .dropdown-container {
            display: none;
            background-color: #f9fafc;
            padding-left: 8px;
        }

        .dropdown-style {
            color: #bdbebd;
            font-size: 16px;
        }

        .sidenav button:hover {
            color: #9d29b2;
        }

        .sidenav a:hover {
            color: white;
            background-color: #9d29b2;
        }

        .main {
            margin-left: 13.1rem;
            /* Same as the width of the sidenav */
            /*font-size: 28px;*/
            /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        .sidenav hr {
            margin: 0;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<div class="sidenav">

    <div>
        <img class="mt-3 ml-3" style="width: 181px; height: 81px;" src="/img/logo-decor.png" alt="teste">
    </div>

    <div class="ml-1">

        <div style="margin-top: 3rem;">
            <hr>
            <a href="/"><i class="fas fa-chart-line mr-2"></i> Dashboard</a>
        </div>
        <hr>

        <a class="dropdown-btn dropdown-toggle" href="#" id="navbarCliente" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-address-book mr-2"></i> Clientes
        </a>
        <div class="dropdown-container">
            <a class="dropdown-item" href="/cliente/listar"><i class="fas fa-search"></i> Ver todos</a>
            <hr>
            <a class="dropdown-item" href="/cliente/create"><i class="fas fa-plus"></i> Adicionar</a>
            <hr>
            <a class="dropdown-item" href="/cliente/listar_inativos"><i class="fas fa-plus"></i> Clientes Inativos</a>
        </div>
        <hr>
        <div>
            <a class="nav-link dropdown-toggle" href="#" id="navbarProduto" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-dolly mr-2"></i> Produtos
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarProduto">
                <a class="dropdown-item" href="/produto/listar"><i class="fas fa-search"></i> Ver todos</a>
                <a class="dropdown-item" href="/produto/create"><i class="fas fa-plus"></i> Adicionar</a>
            </div>
        </div>
        <hr>

        <a href="#contact"><i class="fas fa-clipboard-list mr-2"></i> Relatórios</a>
        <hr>
    </div>
</div>

<body class="main">