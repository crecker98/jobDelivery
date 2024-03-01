<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - jobDelivery</title>
    <link rel="stylesheet" href="<?=base_url("assets/bootstrap/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="<?=base_url("assets/fonts/simple-line-icons.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/css/baguetteBox.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/css/Profile-Edit-Form-styles.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/css/Profile-Edit-Form.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/css/Select-Search.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/css/vanilla-zoom.min.css")?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg fixed-top bg-body clean-navbar navbar-light">
    <div class="container"><a class="navbar-brand logo" href="<?=base_url()?>">jobDelivery</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?=base_url()?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=base_url("professionistiList")?>">Professionisti</a></li>
                <?php
                if (is_null($utente)) {
                ?>
                <li class="nav-item"><a class="nav-link" href="<?=base_url("login")?>">Login</a></li>
                <?php
                }
                ?>
            </ul>
            <?php
            if (!is_null($utente)) {
                ?>
                <div class="dropdown"><a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown"
                                         href="#"><?= $utente->nome . " " . $utente->cognome ?>&nbsp;</a>
                    <div class="dropdown-menu"><a class="dropdown-item" href="<?= base_url("areaRiservata") ?>">Profilo</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url("logout") ?>">Logout</a>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <a class="btn btn-primary shadow" role="button" href="<?= base_url("signup") ?>">REGISTRATI</a>
                <?php
            }
            ?>
        </div>
    </div>
</nav>