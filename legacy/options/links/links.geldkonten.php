<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-bank"></i> Geldkonten</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::geldkonten::legacy', ['option' => 'gk_neu']) ?>'>GK erstellen</a>
            <a class="b-tool-link" href='<?php echo route('web::geldkonten::legacy') ?>'>Kontostände</a>
            <a class="b-tool-link" href='<?php echo route('web::geldkonten::legacy', ['option' => 'uebersicht_ea']) ?>'>Übersicht E/A</a>
            <a class="b-tool-link" href='<?php echo route('web::geldkonten::legacy', ['option' => 'gk_zuweisen']) ?>'>GK zuweisen</a>
            <a class="b-tool-link" href='<?php echo route('web::geldkonten::legacy', ['option' => 'uebersicht_zuweisung']) ?>'>Übersicht Zuweisung</a>
        </div>
    </div>
</div>
