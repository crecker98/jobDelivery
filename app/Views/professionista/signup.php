<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - jobDelivery</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form-styles.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="../assets/css/Select-Search.css">
    <link rel="stylesheet" href="../assets/css/vanilla-zoom.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg fixed-top bg-body clean-navbar navbar-light">
    <div class="container"><a class="navbar-brand logo" href="#">jobDelivery</a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                    class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url("professionista/login") ?>">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Lavora con noi</h2>
            </div>
            <?php if (isset($messaggio)) { ?>
                <div class="alert alert-primary" role="alert"><?= $messaggio ?></div>
            <?php } else { ?>
                <form method="post" enctype="multipart/form-data" action="<?=base_url("professionisti/signup")?>">
                    <?php if (isset($errori)) { ?>
                        <div class="mb-3">
                            <div class="alert alert-danger" style="width: 100%!important;" role="alert">
                                <ul>
                                    <?php foreach ($errori as $errore) { ?>
                                        <li><?= $errore ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="mb-3"><label class="form-label" for="name">Codice fiscale</label><input class="form-control item"
                                                                                              type="text" id="name"
                                                                                              data-bs-theme="light"
                                                                                                        required
                                                                                              name="cf"></div>
                    <div class="mb-3"><label class="form-label" for="name">Nome</label><input class="form-control item"
                                                                                              type="text" id="name"
                                                                                              data-bs-theme="light"
                                                                                              required
                                                                                              name="nome"></div>
                    <div class="mb-3"><label class="form-label" for="name">Cognome</label><input
                                class="form-control item" type="text" id="name-1" data-bs-theme="light" required name="cognome">
                    </div>
                    <div class="mb-3"><label class="form-label" for="name">Specializzazione</label>
                    <input name="specializzazione" class="form-control" type="text" required >
                    </div>
                    <div class="mb-3"><label class="form-label" for="name">Località</label>
                        <input name="localita" class="form-control" type="text" required >
                    </div>

                    <div class="mb-3"><label class="form-label" for="email">Email</label><input
                                class="form-control item" type="email" id="email" required data-bs-theme="light" name="email">
                    </div>
                    <div class="mb-3"><label class="form-label" for="email">Foto</label><input class="form-control item"
                                                                                               type="file" id="email-1"
                                                                                               required
                                                                                               data-bs-theme="light"
                                                                                               name="foto"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input
                                class="form-control item" type="password" id="password" required data-bs-theme="light"
                                name="password"></div>
                    <button class="btn btn-primary" type="submit">Aggiungiti alla squadra</button>
                </form>
            <?php } ?>
        </div>
    </section>
</main>
<footer class="page-footer dark">
    <div class="footer-copyright">
        <p>© 2024 Copyright JobDelivery</p>
    </div>
</footer>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/baguetteBox.min.js"></script>
<script src="../assets/js/vanilla-zoom.js"></script>
<script src="../assets/js/theme.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="../assets/js/Profile-Edit-Form-profile.js"></script>
<script src="../assets/js/Select-Search-Search-Select-V1.js"></script>
</body>

</html>