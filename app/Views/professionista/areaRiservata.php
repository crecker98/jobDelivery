 <main class="page login-page">
        <div class="container profile profile-view" id="profile">
            <form method="post" enctype="multipart/form-data" action="<?=base_url("professionisti/areaRiservata")?>">
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
                    <div class="col-md-4 relative">
                        <div class="avatar">
                            <div class="avatar-bg center" style="background: url(<?=base_url("uploads/".$professionista->foto)?>) center / cover no-repeat;"></div>
                        </div><input class="form-control form-control" type="file" name="foto">
                        <p style="text-align: center;margin-top: 30px;"><?=$professionista->specializzazione?></p>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1>Abbonamento premium:
                                    <?
                                    if(is_null($professionista->dataabbonamento)) {
                                        echo "Non attivo";
                                    } else {
                                        echo "Attivo fino al ".date('d/m/y', strtotime($professionista->scadenzaabbonamento));
                                    }
                                    ?></h1>

                            </div>
                            <div class="col d-lg-flex justify-content-lg-end align-items-lg-center"><button class="btn btn-primary" type="button" data-bs-target="#modalRicaricaConto" data-bs-toggle="modal">Acquista il premium</button></div>
                        </div>
                        <hr>
                        <h1>Profilo - <?=$professionista->cf?></h1>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3"><label class="form-label">Nome</label><input class="form-control" type="text" name="nome" required value="<?=$professionista->nome?>"></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3"><label class="form-label">Cognome</label><input class="form-control" type="text" name="cognome" required value="<?=$professionista->cognome?>"></div>
                            </div>
                        </div>
                        <div class="form-group mb-3"><label class="form-label">Email </label><input class="form-control" type="email" autocomplete="off" name="email" required value="<?=$professionista->email?>"></div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3"><label class="form-label">Località</label>
                                    <input type="text" name="localita" class="form-control" required value="<?=$professionista->localita?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3"><label class="form-label">Password </label><input class="form-control" type="password" name="password" autocomplete="off"></div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 content-right"><button class="btn btn-primary form-btn" type="submit">Aggiorna</button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

 <div class="modal fade" role="dialog" tabindex="-1" id="modalRicaricaConto">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Account premium</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
             </div>
             <div class="modal-body">
                 <form id="payment-form" method="post" action="<?=base_url("professionisti/areaRiservata/premium")?>">
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group mb-3"><label class="form-label" for="cardNumber">Numero carta</label>
                                 <div class="input-group"><input class="form-control" type="tel" id="cardNumber" required="" placeholder="Valid Card Number"><span class="input-group-text"><i class="fa fa-credit-card"></i></span></div>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-7">
                             <div class="form-group mb-3"><label class="form-label" for="cardExpiry"><span>Scadenza&nbsp;</span><span></span></label><input class="form-control" type="tel" id="cardExpiry" required="" placeholder="MM / YY"></div>
                         </div>
                         <div class="col-5 pull-right">
                             <div class="form-group mb-3"><label class="form-label" for="cardCVC">CVC</label><input class="form-control" type="tel" id="cardCVC" required="" placeholder="CVC"></div>
                         </div>
                     </div>
                 </form>
             </div>
             <div class="modal-footer"><img class="img-fluid panel-title-image" src="../assets/img/accepted_cards.png"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Annulla</button><button class="btn btn-primary" type="submit" form="payment-form">Check-out</button></div>
         </div>
     </div>
 </div>