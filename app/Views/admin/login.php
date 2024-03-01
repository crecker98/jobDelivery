<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - jobDelivery</title>
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="<?=base_url('assets/css/baguetteBox.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/Profile-Edit-Form-styles.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/Profile-Edit-Form.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/Select-Search.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/vanilla-zoom.min.css')?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-body clean-navbar navbar-light">
        <div class="container"><a class="navbar-brand logo" href="#">jobDelivery</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                </ul>
            </div>
        </div>
    </nav>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Log In amministrazione</h2>
                </div>
                <form method="post">
                    <?php if (isset($errori)) { ?>
                        <div class="mb-3">
                            <div class="alert alert-danger" style="width: 100%!important;" role="alert">
                                <ul>
                                    <li><?= $errori ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" id="email" data-bs-theme="light" name="email"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control" type="password" id="password" data-bs-theme="light" name="password"></div><button class="btn btn-primary" type="submit">Log In</button>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p>© 2024 Copyright JobDelivery</p>
        </div>
    </footer>
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/js/baguetteBox.min.js')?>"></script>
    <script src="<?=base_url('assets/js/vanilla-zoom.js')?>"></script>
    <script src="<?=base_url('assets/js/theme.js')?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
</body>

</html>