
    <main class="page blog-post-list">
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">I miei interventi</h2>
                </div>
                <div>
                    <?php if (isset($messaggio)) { ?>
                        <div class="alert alert-success" style="width: 100%" role="alert">
                            <?= $messaggio ?>
                        </div>
                    <?php } ?>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">Prossimi</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link " role="tab" data-bs-toggle="tab" href="#tab-2">Passati</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="tab-1">
                            <div class="block-content">
                                <?php
                                foreach ($annunciAperti as $annuncio) {
                                ?>
                                <div class="clean-blog-post" style="padding-bottom: 0px;">
                                    <div class="row">
                                        <div class="col-lg-5"><img class="rounded img-fluid" src="<?=base_url('uploads/'.$annuncio->foto)?>"></div>
                                        <div class="col-lg-7">
                                            <h3><?=$annuncio->nome?></h3>
                                            <div class="info"><span class="text-muted"><?=$annuncio->localita?> -&nbsp;<?=$annuncio->indirizzo?></span><span class="text-muted"><?=$annuncio->utente->nome." ".$annuncio->utente->cognome?></span></div>
                                            <p><?=$annuncio->descrizione?></p>
                                            <button class="btn btn-outline-primary btn-sm" type="button" onclick="confermaCandidatura(<?=$annuncio->candidature[0]->codice?>)">Completa</button>
                                            <button class="btn btn-outline-primary btn-sm" onclick="deleteCandidatura(<?=$annuncio->candidature[0]->codice?>)" type="button" style="margin-left: 10px;width: 31.25px;">
                                                <i class="far fa-trash-alt"></i></button>
                                            <div class="modal fade" role="dialog" tabindex="-1"
                                                 id="modalChat-<?=$annuncio->codice?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"
                                                                style="text-align: left;">Chat intervento</h4>
                                                            <button class="btn-close" type="button"
                                                                    aria-label="Close"
                                                                    data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body"
                                                             style="max-height: 600px; overflow-y: auto;">
                                                            <div>
                                                                <div class="row">
                                                                    <?php
                                                                    foreach ($annuncio->messaggi as $messaggio) {
                                                                        ?>
                                                                        <div class="col-12">
                                                                            <?php
                                                                            if($messaggio->tipomittente == 2) {
                                                                                ?>
                                                                                <div style="text-align: left;">
                                                                                    <p style="font-size: 20.2px;">
                                                                                        <?=$messaggio->messaggio?></p><span
                                                                                            style="font-size: 13px;font-weight: bold;">Inviato il: <?=date('d/m/Y H:i', strtotime($messaggio->timestamp))?></span>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div style="text-align: right;">
                                                                                    <p style="font-size: 20.2px;">
                                                                                        <?=$messaggio->messaggio?></p><span
                                                                                            style="font-size: 13px;font-weight: bold;">Inviato il: <?=date('d/m/Y H:i', strtotime($messaggio->timestamp))?></span>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <form id="sendMex-<?=$annuncio->codice?>" action="<?=base_url('professionisti/inviaMessaggio')?>" method="post">
                                                                <input type="hidden" name="annuncio" value="<?=$annuncio->codice?>">
                                                                <input type="hidden" value="1" name="tipomittente">
                                                                <textarea
                                                                        class="form-control"
                                                                        name="messaggio"
                                                                        required
                                                                        placeholder="Scrivi qui il tuo messaggio"></textarea>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-light" type="button"
                                                                    data-bs-dismiss="modal">Chiudi
                                                            </button>
                                                            <button class="btn btn-primary" type="submit"
                                                                    form="sendMex-<?=$annuncio->codice?>">Invia
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 d-lg-flex justify-content-lg-center align-items-lg-center">
                                            <div class="info"><button class="btn btn-primary" type="button" data-bs-target="#modalChat-<?=$annuncio->codice?>" data-bs-toggle="modal" style="font-size: 20px;width: 49.5px;border-radius: 100%;"><i class="far fa-comments"></i></button></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab-2">
                            <div class="block-content">
                                <?php
                                foreach ($annunciChiusi as $annuncio) {
                                ?>
                                <div class="clean-blog-post" style="padding-bottom: 0px;">
                                    <div class="row">
                                        <div class="col-lg-5"><img class="rounded img-fluid" src="<?=base_url('uploads/'.$annuncio->foto)?>"></div>
                                        <div class="col-lg-7">
                                            <h3><?=$annuncio->nome?></h3>
                                            <div class="info"><span class="text-muted"><?=$annuncio->localita?> -&nbsp;<?=$annuncio->indirizzo?></span><span class="text-muted"><?=$annuncio->utente->nome." ".$annuncio->utente->cognome?></span></div>
                                            <p><?=$annuncio->descrizione?></p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<script>
    function confermaCandidatura(candidatura) {
        if (confirm("Sei sicuro di voler confermare questa candidatura?")) {
            window.location.href = "<?= base_url("professionisti/confermaCandidatura") ?>/" + candidatura;
        }
    }
    function deleteCandidatura(codice) {
        if (confirm("Sei sicuro di voler eliminare l'intervento?")) {
            window.location.href = "<?=base_url('professionisti/eliminaCandidatura/')?>"+codice;
        }
    }
</script>