<?php
$jahr = date("Y");
$vorjahr = date("Y") - 1;
?>
<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-cash-register"></i> Buchen</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::miete_buchen::legacy') ?>'>Miete</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'zahlbetrag_buchen']) ?>'>Kosten</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'ausgangsbuch_kurz']) ?>'>Rechnungsausgang</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'eingangsbuch_kurz', 'anzeige' => 'empfaenger_eingangs_rnr']) ?>'>Rechnungeseingang</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-book-open-variant"></i> Buchungsjournal</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'buchungs_journal']) ?>'>Aktuell</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'buchungs_journal_jahr_pdf', 'jahr' => $jahr]) ?>'>PDF</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'buchungs_journal_jahr_pdf', 'jahr' => $vorjahr, 'xls']) ?>'>Vorjahr XLS</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-magnify"></i> Suchen &amp; Filtern</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'buchung_suchen']) ?>'>Buchung suchen</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'buchungen_zu_kostenkonto']) ?>'>Buchungen zu Kostenkonto</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'konten_uebersicht']) ?>'>Kontenübersicht</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'konto_uebersicht']) ?>'>Kontoübersicht</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-dots-horizontal-circle"></i> Sonstiges</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'kostenkonto_pdf', 'anzeige' => 'empfaenger_eingangs_rnr']) ?>'>Kostenkonto PDF</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'buchungskonto_summiert_xls', 'jahr' => $vorjahr]) ?>'>Buchungskonten summiert XLS</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-bank"></i> Kontoauszüge</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'excel_buchen', 'upload']) ?>'>Hochladen</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'excel_buchen_session']) ?>'>Verbuchen</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'uebersicht_excel_konten']) ?>'>Übersicht</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-chart-box"></i> Berichte</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'monatsbericht_o_a']) ?>'>Monatsbericht o. Auszug</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'monatsbericht_m_a']) ?>'>Monatsbericht m. Auszug</a>
            <a class="b-tool-link" href='<?php echo route('web::buchen::legacy', ['option' => 'kosten_einnahmen']) ?>'>Kosten &amp; Einnahmen</a>
        </div>
    </div>
</div>
