<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-crane"></i> Baustellen</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::construction::legacy', ['option' => 'form_neue_baustelle']) ?>'>Neu</a>
            <a class="b-tool-link" href='<?php echo route('web::construction::legacy', ['option' => 'baustellen_liste']) ?>'>Aktive</a>
            <a class="b-tool-link" href='<?php echo route('web::construction::legacy', ['option' => 'baustellen_liste_inaktiv']) ?>'>Inaktive</a>
        </div>
    </div>
</div>
