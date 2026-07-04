<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-cash-multiple"></i> Miete</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::miete_definieren::legacy') ?>'>Miethöhe definieren</a>
            <a class="b-tool-link" href='<?php echo route('web::mietanpassungen::legacy', ['option' => 'uebersicht']) ?>'>Mietanpassungstabelle</a>
            <a class="b-tool-link" href='<?php echo route('web::mietanpassungen::legacy', ['option' => 'ak4']) ?>'>Ausstattungsklasse 4 (Test)</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-format-list-bulleted"></i> Listen</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::miete_definieren::legacy', ['option' => 'mieterlisten_kostenkat', 'kostenkat' => 'MOD']) ?>'>Mieterliste MOD</a>
            <a class="b-tool-link" href='<?php echo route('web::miete_definieren::legacy', ['option' => 'mieterlisten_kostenkat', 'kostenkat' => 'Untermieter Zuschlag']) ?>'>Mieterliste Untermieterz.</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-chart-line"></i> Mietspiegel</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link b-tool-link--primary" href='<?php echo route('web::mietspiegel::legacy', ['option' => 'neuer_mietspiegel']) ?>'>Neuer Mietspiegel</a>
            <a class="b-tool-link" href='<?php echo route('web::mietspiegel::legacy', ['option' => 'mietspiegelliste']) ?>'>Mietspiegelliste</a>
        </div>
    </div>
</div>
