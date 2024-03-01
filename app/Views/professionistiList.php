<main class="page">
    <section class="clean-block about-us">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">I professionisti</h2>
            </div>
            <div>
                <form class="row" method="post" id="filtriForm">
                    <div class="col">
                        <div style="text-align: center;"><span>Mansione</span></div>
                        <input name="mansione" class="form-control" value="<?=$mansione?>">
                    </div>
                    <div class="col">
                            <div style="text-align: center;"><span>Valutazione</span></div>
                        <select class="form-select" name="valutazione">
                                <option value="0">Tutte le valutazioni</option>
                                <option <?=$valutazioneMedia == 1 ? "selected" : ""?>>1</option>
                                <option <?=$valutazioneMedia == 2 ? "selected" : ""?>>2</option>
                                <option <?=$valutazioneMedia == 3 ? "selected" : ""?>>3</option>
                                <option <?=$valutazioneMedia == 4 ? "selected" : ""?>>4</option>
                                <option <?=$valutazioneMedia == 5 ? "selected" : ""?>>5</option>
                            </select>
                    </div>
                </form>
                <div class="row" style="margin-top: 10px;">
                    <div class="col text-center"><button class="btn btn-primary" form="filtriForm" type="submit">Applica i filtri</button></div>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <?php
                foreach($professionisti as $professionista) {
                ?>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="<?=base_url("uploads/".$professionista->foto)?>">
                        <div class="card-body info">
                            <h4 class="card-title"><?=$professionista->nome." ".$professionista->cognome?></h4>
                            <p class="card-text"><?=$professionista->specializzazione?></p>
                            <p class="card-text"><?=strlen($professionista->valutazionemedia) == 0 ? "Non presente" : intval($professionista->valutazionemedia)?></p>
                            <a href="mailto:<?=$professionista->email?>">
                            <div class="icons">
                                <button class="btn btn-primary" type="button"  >Invia messaggio</button>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
</main>