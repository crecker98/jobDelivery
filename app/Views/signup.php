
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Registrati</h2>
                </div>
                <?php if (isset($messaggio)) { ?>
                    <div class="alert alert-primary" role="alert"><?= $messaggio ?></div>
                <?php } else { ?>
                <form method="post">
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
                    <div class="mb-3"><label class="form-label" for="name">Nome</label><input class="form-control item" type="text" id="name" data-bs-theme="light" name="nome"></div>
                    <div class="mb-3"><label class="form-label" for="name">Cognome</label><input class="form-control item" type="text" id="name-1" data-bs-theme="light" name="cognome"></div>
                    <div class="mb-3"><label class="form-label" for="name">Codice fiscale</label><input class="form-control item" type="text" id="name-2" data-bs-theme="light" name="cf"></div>
                    <div class="mb-3"><label class="form-label" for="name">Telefono</label><input class="form-control item" type="text" id="name-3" data-bs-theme="light" name="telefono"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control item" type="password" id="password" data-bs-theme="light" name="password"></div>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" id="email" data-bs-theme="light" name="email"></div><button class="btn btn-primary" type="submit">Registrati</button>
                </form>
                <?php } ?>
            </div>
        </section>
    </main>
