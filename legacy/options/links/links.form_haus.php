<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-home-modern"></i> Häuser</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::haeuserform::legacy', ['daten_rein' => 'haus_neu']) ?>'>Neu</a>
            <a class="b-tool-link" href='<?php echo route('web::haeuser::legacy', ['haus_raus' => 'haus_kurz']) ?>'>Alle</a>
            <a class="b-tool-link" href='<?php echo route('web::haeuser::legacy', ['haus_raus' => 'haus_aendern']) ?>'>Ändern</a>
        </div>
    </div>
</div>
