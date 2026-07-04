<div class="b-tools-grid">
    <div class="b-tools-group">
        <div class="b-tools-group__header"><i class="mdi mdi-cash-multiple"></i> Darstellung</div>
        <div class="b-tools-group__links">
            <a class="b-tool-link" href='<?php echo route('web::mietkontenblatt::legacy', ['anzeigen' => 'mietkonto_uebersicht_detailiert', 'mietvertrag_id' => request()->input('mietvertrag_id')]) ?>'>Seit Einzug</a>
            <a class="b-tool-link" href='<?php echo route('web::mietkontenblatt::legacy', ['anzeigen' => 'mietkonto_detailiert_seit_1zahlung', 'mietvertrag_id' => request()->input('mietvertrag_id')]) ?>'>Seit 1. Zahlung</a>
            <a class="b-tool-link" href='<?php echo route('web::miete_buchen::legacy') ?>'>Zeitraum eingrenzen</a>
        </div>
    </div>
</div>
