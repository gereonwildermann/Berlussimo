<?php
$monat = sprintf('%02d', date("m"));
$jahr = date("Y");
$vorjahr = date("Y") - 1;
?>
<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-file-document"></i> Mietverträge</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::mietvertraege::create') ?>'>Neu</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'mietvertrag_kurz']) ?>'>Alle</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'mietvertrag_aktuelle']) ?>'>Aktuelle</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'mietvertrag_abgelaufen']) ?>'>Abgelaufene</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-swap-horizontal"></i> Ein- und Auszüge</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'letzte_auszuege']) ?>'>Letzte Auszüge</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'letzte_einzuege']) ?>'>Letzte Einzüge</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'alle_letzten_auszuege', 'monat' => $monat, 'jahr' => $jahr]) ?>'>Alle Auszüge</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'alle_letzten_einzuege', 'monat' => $monat, 'jahr' => $jahr]) ?>'>Alle Einzüge</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-email-alert"></i> Mahnliste</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'mahnliste_alle']) ?>'>Alle</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'mahnliste']) ?>'>Aktuelle</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'mahnliste_ausgezogene']) ?>'>Ehemalige</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-dots-horizontal-circle"></i> Sonstige</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'guthaben_liste']) ?>'>Guthaben</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'saldenliste']) ?>'>Saldenlisten</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'nebenkosten']) ?>'>Nebenkosten</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'nebenkosten_pdf_zs', 'jahr' => $vorjahr]) ?>'>NK PDF</a>
            <a class="b-tool-link" href='<?php echo route('web::mietvertraege::legacy', ['mietvertrag_raus' => 'nebenkosten_pdf_zs', 'jahr' => $vorjahr, 'xls']) ?>'>NK XLS</a>
            <?php if (Auth::user()->can(\App\Libraries\Permission::PERMISSION_MODUL_EINHEIT)): ?>
                <a class="b-tool-link" href='<?php echo route('web::einheiten::legacy', ['einheit_raus' => 'mieterliste_aktuell']) ?>'>Mieterliste</a>
            <?php endif ?>
        </div>
    </div>
</div>
