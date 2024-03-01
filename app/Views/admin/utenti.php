
    <main class="page service-page">
        <div class="container" style="margin-top: 20px;">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-xxl-9">
                    <div class="card shadow">
                        <?php if (isset($messaggio)) { ?>
                            <div class="alert alert-success" style="width: 100%" role="alert">
                                <?= $messaggio ?>
                            </div>
                        <?php } ?>
                        <div class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
                            <h5 class="display-6 text-nowrap text-capitalize mb-0">Clienti registrati</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nominativo</th>
                                            <th>Località</th>
                                            <th class="text-center">Azioni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach($utenti as $utente){
                                        ?>
                                        <tr>
                                            <td class="text-truncate" style="max-width: 200px;"><?=$utente->nome." ".$utente->cognome?></td>
                                            <td class="text-truncate" style="max-width: 200px;"><?=$utente->email?></td>
                                            <?php
                                            if($utente->stato == 1) {
                                            ?>
                                            <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-square-fill fs-5 text-danger" onclick="bannaUtente('<?=$utente->cf?>')" style="margin-left: 0px;">
                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"></path>
                                                </svg></td>
                                            <?php } else { ?>
                                            <td></td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script>
    function bannaUtente(cf){
        if(confirm("Sei sicuro di voler bannare l'utente?")){
            window.location.href = "<?=base_url('admin/bannaUtente')?>/"+cf;
        }
    }
</script>