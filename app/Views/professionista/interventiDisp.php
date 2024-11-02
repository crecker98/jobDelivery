 <main class="page service-page">
        <section class="clean-block clean-services dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Annunci di zona</h2>
                </div>
                <div class="row">
                    <?php
                    foreach ($annunci as $annuncio) {
                        ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card"><img class="card-img-top w-100 d-block" src="<?=base_url("uploads/".$annuncio->foto)?>">
                            <div class="card-body">
                                <h4 class="card-title"><?=$annuncio->nome?></h4><span><?=$annuncio->indirizzo?></span>
                                <p class="card-text"><?=$annuncio->descrizione?></p>
                                <span><?=$annuncio->utente->nome." ".$annuncio->utente->cognome?></span>
                            </div>
                            <div><button class="btn btn-outline-primary btn-sm" type="button" onclick="candidati(<?=$annuncio->codice?>)">Candidati</button></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

 <script>
     function candidati(codice) {
         if(confirm("Sei sicuro di voler candidarti?" )) {
             window.location.href = "<?=base_url("professionisti/candidati/")?>" + codice;
         }
     }
 </script>