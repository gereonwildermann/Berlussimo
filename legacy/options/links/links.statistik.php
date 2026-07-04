<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-hammer"></i> Bau</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::statistik::legacy', ['option' => 'bau_stat_menu']) ?>'>Einheit</a>
            <a class="b-tool-link" href='<?php echo route('web::statistik::legacy', ['option' => 'baustelle']) ?>'>Baustellen</a>
            <a class="b-tool-link" href='<?php echo route('web::zeiterfassung::legacy', ['option' => 'stunden']) ?>'>Stundenübersicht</a>
            <a class="b-tool-link" href='<?php echo route('web::statistik::legacy', ['option' => 'fenster']) ?>'>Fensterübersicht</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-home-city"></i> Vermietung</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::statistik::legacy', ['option' => 'leer_vermietet_jahr']) ?>'>Leerstand</a>
            <a class="b-tool-link" href='<?php echo route('web::statistik::legacy', ['option' => 'stellplaetze']) ?>'>Stellplätze (E)</a>
            <a class="b-tool-link" href='<?php echo route('web::statistik::legacy', ['option' => 'garage']) ?>'>Garage (GBN)</a>
        </div>
    </div>
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-finance"></i> Finanzen</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::statistik::legacy', ['option' => 'me_k']) ?>'>E/A Diagramm</a>
            <a class="b-tool-link" href='<?php echo route('web::statistik::legacy', ['option' => 'sollmieten_aktuell']) ?>'>Sollmieten aktuell inkl. Leerstand</a>
            <a class="b-tool-link" href='<?php echo route('web::statistik::legacy', ['option' => 'sollmieten_haeuser', 'pdf']) ?>'>Sollmieten Häusergruppen</a>
            <a class="b-tool-link" href='<?php echo route('web::statistik::legacy', ['option' => 'leer_haus_stat']) ?>'>Statistik im Haus 5J</a>
            <a class="b-tool-link" href='<?php echo route('web::leerstand::legacy', ['option' => 'kontrolle_preise']) ?>'>Vermietungspreise</a>
        </div>
    </div>
</div>
