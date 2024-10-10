<main class="page landing-page">
    <div class="container profile profile-view" id="profile">
        <form method="post" action="<?= base_url("areaRiservata") ?>">
            <div class="row profile-row">
                <?php if (isset($errori)) { ?>
                    <div class="alert alert-danger" style="width: 100%" role="alert">
                        <ul>
                            <?php foreach ($errori as $errore) { ?>
                                <li><?= $errore ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                    <?php if (isset($messaggio)) { ?>
                        <div class="alert alert-success" style="width: 100%" role="alert">
                            <?= $messaggio ?>
                        </div>
                    <?php } ?>
                <div class="col-md-8 col-lg-12">
                    <h1>Profilo - <?= $utente->cf ?></h1>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Nome</label><input
                                        class="form-control" type="text" name="nome" required
                                        value="<?= $utente->nome ?>"></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Cognome</label><input
                                        class="form-control" type="text" name="cognome" required
                                        value="<?= $utente->cognome ?>"></div>
                        </div>
                    </div>
                    <div class="form-group mb-3"><label class="form-label">Email </label><input class="form-control"
                                                                                                type="email"
                                                                                                autocomplete="off"
                                                                                                required
                                                                                                value="<?= $utente->email ?>"
                                                                                                name="email"></div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Telefono</label><input
                                        class="form-control" type="text" name="telefono" required
                                        value="<?= $utente->telefono ?>"></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Password </label><input
                                        class="form-control" type="password" name="password" autocomplete="off"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 content-right">
                            <button class="btn btn-primary form-btn" type="submit">Aggiorna</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <section style="margin-bottom: 100px;">
        <div class="container">
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab"
                                                                href="#tab-1">Aperti</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link " role="tab" data-bs-toggle="tab"
                                                                href="#tab-2">Conclusi</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-xxl-9">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <button class="btn btn-primary" type="button"
                                                        data-bs-target="#modalInerisciAnnuncio" data-bs-toggle="modal">
                                                    Aggiungi
                                                </button>
                                                <div class="modal fade" role="dialog" tabindex="-1"
                                                     id="modalInerisciAnnuncio">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Nuovo annuncio</h4>
                                                                <button class="btn-close" type="button"
                                                                        aria-label="Close"
                                                                        data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="insertNewAnnuncio"
                                                                      enctype="multipart/form-data"
                                                                      action="<?= base_url("areaRiservata/inserisciAnnuncio") ?>"
                                                                      method="post">
                                                                    <div><input class="form-control" type="text"
                                                                                name="nome" style="margin-bottom: 10px;"
                                                                                placeholder="Oggetto annuncio"
                                                                                required=""></div>
                                                                    <div><span>Immagine</span><input
                                                                                class="form-control"
                                                                                type="file"
                                                                                name="foto" style="margin-bottom: 10px;"
                                                                                placeholder="Immagine annuncio"
                                                                                required=""></div>
                                                                    <div>
                                                                        <textarea class="form-control"
                                                                                   name="descrizione"
                                                                                   placeholder="Inserisci qui la descrizione"
                                                                                   style="margin-bottom: 10px;"
                                                                                   required=""></textarea>
                                                                        <div style="margin-bottom: 10px;">
                                                                            <span>Professionalità richiesta</span>
                                                                            <input
                                                                                    class="form-control"
                                                                                    type="text"
                                                                                    name="specializzazione" required="">
                                                                                </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            <span>Località</span><input
                                                                                    class="form-control"
                                                                                    type="text"
                                                                                    name="localita" required=""></div>
                                                                        <div style="margin-bottom: 10px;"><input
                                                                                    class="form-control" type="text"
                                                                                    name="indirizzo"
                                                                                    placeholder="Indirizzo" required="">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-light" type="button"
                                                                        data-bs-dismiss="modal">Annulla
                                                                </button>
                                                                <button class="btn btn-primary" type="submit"
                                                                        form="insertNewAnnuncio">Inserisci
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Indirizzo</th>
                                                    <th class="text-center">Azioni</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach ($annunciAperti as $annuncio) {
                                                ?>
                                                <tr>
                                                    <td class="text-truncate" style="max-width: 200px;"><?=$annuncio->nome?></td>
                                                    <td class="text-truncate" style="max-width: 200px;"><?=$annuncio->indirizzo?></td>
                                                    <td class="text-center">
                                                        <?php
                                                        if($annuncio->stato == 1) {
                                                        ?>
                                                        <a href="#"
                                                                               data-bs-target="#modalCandidati-<?=$annuncio->codice?>"
                                                                               data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                 height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                                 class="bi bi-person-fill fs-5 text-primary">
                                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
                                                            </svg>
                                                        </a>
                                                        <?php } else { ?>
                                                        <a href="#" data-bs-target="#modalChat-<?=$annuncio->codice?>"
                                                               data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                 height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                                 class="bi bi-chat-text fs-5 text-primary"
                                                                 style="margin-left: 15px;">
                                                                <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894m-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"></path>
                                                                <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8m0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5"></path>
                                                            </svg>
                                                        </a>
                                                        <?php } ?>
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                 height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                                 onclick="deleteAnnuncio(<?=$annuncio->codice?>)"
                                                                 class="bi bi-trash fs-5 text-danger"
                                                                 style="margin-left: 15px;">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                                                            </svg>
                                                        </a>
                                                        <div class="modal fade" role="dialog" tabindex="-1"
                                                             id="modalCandidati-<?=$annuncio->codice?>">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Candidati per questo
                                                                            annuncio</h4>
                                                                        <button class="btn-close" type="button"
                                                                                aria-label="Close"
                                                                                data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-xl-10 col-xxl-9">
                                                                                <div class="card shadow">
                                                                                    <div class="card-body">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table table-striped table-hover">
                                                                                                <thead>
                                                                                                <tr>
                                                                                                    <th>Nome</th>
                                                                                                    <th>Valutazione
                                                                                                        media
                                                                                                    </th>
                                                                                                    <th class="text-center">
                                                                                                        Azioni
                                                                                                    </th>
                                                                                                </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                <?php
                                                                                                foreach ($annuncio->candidature as $candidatura) {
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td class="text-truncate"
                                                                                                        style="max-width: 200px;">
                                                                                                        <?=$candidatura->professionista->nome." ".$candidatura->professionista->cognome?>
                                                                                                    </td>
                                                                                                    <td class="text-truncate"
                                                                                                        style="max-width: 200px;">
                                                                                                        <?=$candidatura->professionista->email?>
                                                                                                    </td>
                                                                                                    <td class="text-center">
                                                                                                        <button class="btn btn-primary"
                                                                                                                type="button"
                                                                                                                onclick="confermaCandidatura(<?=$annuncio->codice?>,'<?=$candidatura->professionista->cf?>')"
                                                                                                                style="font-size: 12px;">
                                                                                                            Conferma
                                                                                                        </button>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <?php } ?>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-light" type="button"
                                                                                data-bs-dismiss="modal">Chiudi
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                                                    if($messaggio->tipomittente == 1) {
                                                                                    ?>
                                                                                    <div class="row ">
                                                                                    <div class="col-12" style="text-align: left;">
                                                                                        <p style="font-size: 20.2px;">
                                                                                            <?=$messaggio->messaggio?></p><span
                                                                                                style="font-size: 13px;font-weight: bold;">Inviato il: <?=date('d/m/Y H:i', strtotime($messaggio->timestamp))?></span>
                                                                                    </div>
                                                                                    </div>
                                                                                    <?php } else { ?>
                                                                                            <div class="row">
                                                                                                <div class="col-12" style="text-align: right;">
                                                                                                    <p style="font-size: 20.2px;">
                                                                                                        <?=$messaggio->messaggio?></p><span
                                                                                                            style="font-size: 13px;font-weight: bold;">Inviato il: <?=date('d/m/Y H:i', strtotime($messaggio->timestamp))?></span>
                                                                                                </div>
                                                                                            </div>
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <form id="sendMex-<?=$annuncio->codice?>" action="<?=base_url('areaRiservata/inviaMessaggio')?>" method="post">
                                                                            <input type="hidden" name="annuncio" value="<?=$annuncio->codice?>">
                                                                            <input type="hidden" value="2" name="tipomittente">
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
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " role="tabpanel" id="tab-2">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-xxl-9">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Indirizzo</th>
                                                    <th class="text-center">Azioni</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach ($annunciConclusi as $annuncio) {
                                                ?>
                                                <tr>
                                                    <td class="text-truncate" style="max-width: 200px;"><?=$annuncio->nome?></td>
                                                    <td class="text-truncate" style="max-width: 200px;"><?=$annuncio->indirizzo?></td>
                                                    <td class="text-center">
                                                        <?php
                                                        if(!$annuncio->recensito) {
                                                        ?>
                                                        <a href="#"
                                                                               data-bs-target="#modalRecensione-<?=$annuncio->codice?>"
                                                                               data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                 height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                                 class="bi bi-star-fill fs-5 text-primary">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                            </svg>
                                                        </a>
                                                        <?php } ?>
                                                        <div class="modal fade" role="dialog" tabindex="-1"
                                                             id="modalRecensione-<?=$annuncio->codice?>">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Recensione a: <?=$annuncio->candidature[0]->professionista->nome." ".$annuncio->candidature[0]->professionista->cognome?></h4>
                                                                        <button class="btn-close" type="button"
                                                                                aria-label="Close"
                                                                                data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form id="insertRecensione-<?=$annuncio->codice?>" action="<?=base_url('areaRiservata/recensisci')?>" method="post">
                                                                            <input name="annuncio" type="hidden" value="<?=$annuncio->codice?>">
                                                                            <input name="candidatura" type="hidden" value="<?=$annuncio->candidature[0]->codice?>">
                                                                            <input name="professionista" type="hidden" value="<?=$annuncio->candidature[0]->professionista->cf?>">
                                                                            <select class="form-select"
                                                                                    name="valutazione">
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                            </select>
                                                                            <textarea class="form-control"
                                                                                               name="commento"
                                                                                               style="margin-top: 10px;"
                                                                                      required
                                                                                               placeholder="Inserisci qui il tuo commento"></textarea>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-light" type="button"
                                                                                data-bs-dismiss="modal">Chiudi
                                                                        </button>
                                                                        <button class="btn btn-primary" type="submit"
                                                                                form="insertRecensione-<?=$annuncio->codice?>">Inserisci
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-3">
                        <p>Content for tab 3.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    function deleteAnnuncio(codice) {
        if (confirm("Sei sicuro di voler eliminare questo annuncio?")) {
            window.location.href = "<?= base_url("areaRiservata/eliminaAnnuncio") ?>/" + codice;
        }
    }

</script>