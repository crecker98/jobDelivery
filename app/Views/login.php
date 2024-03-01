<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Log In</h2>
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
                <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item"
                                                                                            type="email" id="email"
                                                                                            data-bs-theme="light"
                                                                                            name="email"></div>
                <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control"
                                                                                                  type="password"
                                                                                                  id="password"
                                                                                                  data-bs-theme="light"
                                                                                                  name="password"></div>
                <button class="btn btn-primary" type="submit">Log In</button>
                <p class="text-muted"><a href="#" data-bs-target="#modalResetPsw" data-bs-toggle="modal">Forgot your
                        password?</a></p>
            </form>

        </div>
    </section>
</main>
<div class="modal" role="dialog" tabindex="-1" id="modalResetPsw">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Recupera password</h4>
                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formReset" method="post" action="<?= base_url("login/resetPassword") ?>">
                    <?php if (isset($erroriReset)) { ?>
                        <div class="mb-3">
                            <div class="alert alert-danger" style="width: 100%!important;" role="alert">
                                <ul>
                                    <li><?= $erroriReset ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <input class="form-control" type="email" name="email"
                           placeholder="Inserisci l'email che ricordi">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-bs-dismiss="modal">Annulla</button>
                <button class="btn btn-primary" type="submit" form="formReset">Resetta</button>
            </div>
        </div>
    </div>
</div>
<?php if (isset($reset)) { ?>
    <script>
        alert("La tua nuova password è: password");
    </script>
<?php } elseif (isset($erroriReset)) {
    ?>
    <script>
        $(window).on('load', function () {
            $('#modalResetPsw').modal('show');
        });
    </script>
    <?php
} ?>