<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-receipt"></i> Rechnungen</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::rechnungen::legacy', ['option' => 'rechnung_erfassen']) ?>'>Erfassen</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'erfasste_rechnungen']) ?>'>Alle</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'gutschrift_erfassen']) ?>'>Gutschrift</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'eingangsbuch']) ?>'>Eingangsbuch</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'ausgangsbuch']) ?>'>Ausgangsbuch</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'rechnungsbuch_suche']) ?>'>Rechnungsbücher PDF</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'sepa_druckpool']) ?>'>SEPA aus Rechnung</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-magnify"></i> Suchen &amp; Filtern</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'rechnung_suchen']) ?>'>Rechnung suchen</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'kosten_einkauf']) ?>'>Kosten Einkauf</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'vollstaendige_rechnungen']) ?>'>Vollständige Rechnungen</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'unvollstaendige_rechnungen']) ?>'>Unvollständige Rechnungen</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'kontierte_rechnungen']) ?>'>Kontierte Rechnungen</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'nicht_kontierte_rechnungen']) ?>'>Nicht kontierte Rechnungen</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'verbindlichkeiten']) ?>'>Verbindlichkeiten</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'forderungen']) ?>'>Forderungen</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'seb']) ?>'>SEB</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-import"></i> Import</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'form_ugl']) ?>'>UGL</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'import_csv']) ?>'>CSV</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-folder-multiple"></i> Pool</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'pool_rechnungen']) ?>'>Rechnung aus Pool erstellen</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'u_pool_liste']) ?>'>Rechnungen im Unterpool</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'u_pool_erstellen']) ?>'>Unterpool erstellen</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'pdf_druckpool', 'no_logo']) ?>'>PDF-Druckpool</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'sepa_druckpool']) ?>'>SEPA-Druckpool</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-tag-text-outline"></i> Angebote</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::rechnungen::legacy', ['option' => 'angebot_erfassen']) ?>'>Erfassen</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'meine_angebote']) ?>'>Alle</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-file-check"></i> Buchungsbelege</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'buchungsbelege']) ?>'>Buchungsbelege</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'rg_aus_beleg']) ?>'>Rechnung aus Beleg</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-dots-horizontal-circle"></i> Sonstige</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::zeiterfassung::legacy', ['option' => 'stundennachweise']) ?>'>Stundennachweise</a>
            <a class="b-tool-link" href='<?php echo route('web::rechnungen::legacy', ['option' => 'vg_rechnungen']) ?>'>Verwaltergebühren</a>
        </div>
    </div>
</div>
