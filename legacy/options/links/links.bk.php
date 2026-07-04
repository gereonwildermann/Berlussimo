<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-flash"></i> Betriebs- &amp; Nebenkostenabrechnung</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::bk::legacy', ['option' => 'assistent']) ?>'>Assistent</a>
            <a class="b-tool-link" href='<?php echo route('web::bk::legacy', ['option' => 'profile']) ?>'>Profile</a>
            <a class="b-tool-link" href='<?php echo route('web::bk::legacy', ['option' => 'profil_reset']) ?>'>Profil reset</a>
            <a class="b-tool-link" href='<?php echo route('web::bk::legacy', ['option' => 'zusammenfassung']) ?>'>Zusammenfassung</a>
            <a class="b-tool-link" href='<?php echo route('web::bk::legacy', ['option' => 'pdf_ausgabe']) ?>'>PDF-Ausgabe</a>
            <a class="b-tool-link" href='<?php echo route('web::bk::legacy', ['option' => 'anpassung_bk_hk']) ?>'>BK/HK Anpassung</a>
            <a class="b-tool-link" href='<?php echo route('web::bk::legacy', ['option' => 'energie']) ?>'>Energiewerte</a>
            <a class="b-tool-link" href='<?php echo route('web::bk::legacy', ['option' => 'anpassung_bk_nk']) ?>'>NK-BK eingeben</a>
            <a class="b-tool-link" href='<?php echo route('web::bk::legacy', ['option' => 'form_profil_kopieren']) ?>'>Profile kopieren</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-domain"></i> Wirtschaftseinheiten</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::bk::legacy', ['option' => 'wirtschaftseinheit_neu']) ?>'>Neu</a>
            <a class="b-tool-link" href='<?php echo route('web::bk::legacy', ['option' => 'wirtschaftseinheiten']) ?>'>Alle</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-email-multiple"></i> Serienbriefe</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::bk::legacy', ['option' => 'serienbrief_vorlage_neu']) ?>'>Neue Vorlage</a>
            <a class="b-tool-link" href='<?php echo route('web::bk::legacy', ['option' => 'serienbrief']) ?>'>Vorlagen</a>
        </div>
    </div>
</div>
