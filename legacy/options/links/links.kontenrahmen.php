<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-file-tree"></i> Kontenrahmen</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::kontenrahmen::legacy', ['option' => 'kontenrahmen_neu']) ?>'>Neu</a>
            <a class="b-tool-link" href='<?php echo route('web::kontenrahmen::legacy', ['option' => 'kontenrahmen_uebersicht']) ?>'>Alle</a>
            <a class="b-tool-link" href='<?php echo route('web::kontenrahmen::legacy', ['option' => 'kostenkonto_neu']) ?>'>Buchungskonto erstellen</a>
            <a class="b-tool-link" href='<?php echo route('web::kontenrahmen::legacy', ['option' => 'gruppen']) ?>'>Gruppen anzeigen</a>
            <a class="b-tool-link" href='<?php echo route('web::kontenrahmen::legacy', ['option' => 'gruppe_neu']) ?>'>Gruppe erstellen</a>
            <a class="b-tool-link" href='<?php echo route('web::kontenrahmen::legacy', ['option' => 'kontoarten']) ?>'>Kontoarten anzeigen</a>
            <a class="b-tool-link" href='<?php echo route('web::kontenrahmen::legacy', ['option' => 'kontoart_neu']) ?>'>Kontoart erstellen</a>
            <a class="b-tool-link" href='<?php echo route('web::kontenrahmen::legacy', ['option' => 'kontenrahmen_zuweisen']) ?>'>Kontenrahmen zuweisen</a>
        </div>
    </div>
</div>
