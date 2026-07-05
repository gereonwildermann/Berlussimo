<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-home-alert"></i> Leerstände</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::leerstand::legacy', ['option' => 'objekt']) ?>'>Alle</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-magnify"></i> Vermietung</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::leerstand::legacy', ['option' => 'vermietung']) ?>'>Alle</a>
            <a class="b-tool-link" href='<?php echo route('web::leerstand::legacy', ['option' => 'vermietung_wedding']) ?>'>Favoriten</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-wrench"></i> Sanierung</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::leerstand::legacy', ['option' => 'sanierung']) ?>'>Alle</a>
            <a class="b-tool-link" href='<?php echo route('web::leerstand::legacy', ['option' => 'sanierung_wedding']) ?>'>Favoriten</a>
        </div>
    </div>
</div>
