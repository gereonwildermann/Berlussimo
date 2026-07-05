<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-account"></i> Mieter-Mandate</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::sepa::legacy', ['option' => 'mandat_mieter_neu']) ?>'>Neu</a>
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'mandate_mieter_kurz']) ?>'>Alle</a>
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'mandate_mieter']) ?>'>Einziehen</a>
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'ls_auto_buchen']) ?>'>Buchen</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-receipt"></i> Rechnungen-Mandate</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'mandate_rechnungen']) ?>'>Alle</a>
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 're_zahlen']) ?>'>RE zahlen</a>
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'ra_zahlen']) ?>'>RA zahlen</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-home-currency-usd"></i> Hausgeld-Mandate</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::sepa::legacy', ['option' => 'mandat_hausgeld_neu']) ?>'>Neu</a>
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'mandate_hausgeld_kurz']) ?>'>Alle</a>
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'mandate_hausgeld']) ?>'>Einziehen</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-bank"></i> Manuelle Überweisung</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'sammel_ue']) ?>'>Sammelüberweisung</a>
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'sammel_ue_IBAN']) ?>'>Sammelüberweisung IBAN</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-view-list"></i> Übersicht</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'sammler_anzeigen']) ?>'>Aktueller Sammler</a>
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'sepa_files']) ?>'>Archiv (Aktuelles Konto)</a>
            <a class="b-tool-link" href='<?php echo route('web::sepa::legacy', ['option' => 'sepa_files_fremd']) ?>'>Archiv</a>
        </div>
    </div>
</div>
