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
    <link rel="stylesheet" href="/css/menu-lateral.css">
    <title><?= isset($titulo) ? $titulo : 'Meu Sistema' ?></title>
    <style>
        body {
            background: #EEE;
            overflow-x: hidden;
            line-height: 1rem;
        }

        .main {
            margin-left: 25rem;
            /* Same as the width of the sidenav */
            /*font-size: 28px;*/
            /* Increased text to enable scrolling */
            padding: 0px 10px;
        }
    </style>
</head>

<body class="">
    <div class="container">
        <nav class="">
            <ul class="mcd-menu">
                <li style="margin-top: 11rem;">
                    <a href="">
                        <i class="fa fa-home"></i>
                        <strong>Home</strong>
                        <small>sweet home</small>
                    </a>
                </li>
                <li>
                    <a href="" class="active">
                        <i class="fa fa-edit"></i>
                        <strong>About us</strong>
                        <small>sweet home</small>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-gift"></i>
                        <strong>Features</strong>
                        <small>sweet home</small>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-globe"></i>
                        <strong>News</strong>
                        <small>sweet home</small>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Blog</strong>
                        <small>what they say</small>
                    </a>
                    <ul>
                        <li><a href="#"><i class="fa fa-globe"></i>Mission</a></li>
                        <li>
                            <a href="#"><i class="fa fa-group"></i>Our Team</a>
                            <ul>
                                <li><a href="#"><i class="fa fa-female"></i>Leyla Sparks</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-male"></i>Gleb Ismailov</a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-leaf"></i>About</a></li>
                                        <li><a href="#"><i class="fa fa-tasks"></i>Skills</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fa fa-female"></i>Viktoria Gibbers</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-trophy"></i>Rewards</a></li>
                        <li><a href="#"><i class="fa fa-certificate"></i>Certificates</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-picture-o"></i>
                        <strong>Portfolio</strong>
                        <small>sweet home</small>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-envelope-o"></i>
                        <strong>Contacts</strong>
                        <small>drop a line</small>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="main">