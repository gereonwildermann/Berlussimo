<?php
$jahr = date("Y");
$vorjahr = date("Y") - 1;
if (!session()->has('objekt_id')) {
    $wegHeader = 'WEG';
} else {
    $o = new objekt();
    $o->get_objekt_infos(session()->get('objekt_id'));
    $wegHeader = 'WEG: ' . $o->objekt_kurzname;
}
?>
<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-home-modern"></i> <?php echo $wegHeader ?></div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy') ?>'>E-Mail</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'stammdaten_weg', 'lang' => 'en']) ?>'>Stammdaten</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'pdf_et_liste_alle_kurz']) ?>'>Eigentümerdaten</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'einheiten']) ?>'>Einheiten</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'eigentuemer_wechsel']) ?>'>Eigentümerwechsel</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'mahnliste']) ?>'>Mahnliste</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'serienbrief']) ?>'>Serienbrief</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-cash-multiple"></i> Buchen</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'wohngeld_buchen_auswahl_e']) ?>'>Hausgeld</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'zahlbetrag_buchen']) ?>'>Kosten</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'kontostand_erfassen']) ?>'>Kontostand erfassen</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-clipboard-text"></i> Wirtschaftspläne</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::weg::legacy', ['option' => 'wp_neu']) ?>'>Neu</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'wpliste']) ?>'>Alle</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-file-document"></i> IHR</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'ihr']) ?>'>IHR</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'pdf_ihr']) ?>'>PDF-IHR</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-bank"></i> Kontenübersicht</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'hausgeld_zahlungen', 'jahr' => $jahr]) ?>'><?php echo $jahr ?></a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'hausgeld_zahlungen_xls', 'jahr' => $vorjahr]) ?>'><?php echo $vorjahr ?> XLS</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-calculator"></i> Hausgeldabrechnung</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::weg::legacy', ['option' => 'assistent']) ?>'>Assistent</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'hga_profile']) ?>'>Profile</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'pdf_hausgelder']) ?>'>Hausgelder</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'hk_verbrauch_tab']) ?>'>Heizkosten</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'hga_gesamt_pdf']) ?>'>Gesamtabrechnung</a>
            <a class="b-tool-link" href='<?php echo route('web::weg::legacy', ['option' => 'hga_einzeln']) ?>'>Einzelabrechnung</a>
        </div>
    </div>
</div>
