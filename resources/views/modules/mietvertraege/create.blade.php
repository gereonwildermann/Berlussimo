@extends('layouts.legacy')

@section('breadcrumbs')
    <a href="{{ route('web::mietvertraege::legacy') }}" class="breadcrumb">Mietverträge</a>
    <a href="" class="breadcrumb">Neu</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card-panel">
                <form action="{{route('web::mietvertraege::store')}}" method="post">
                    <div class="row">
                        <div class="input-field col-xs-12 col-md-6">
                            <i class="mdi mdi-account prefix"></i>
                            <div id="tenant-autocomplete" class="chips invalid"
                                 style="margin-left: 3rem; border-bottom: 1px solid #28b8b4">
                            </div>
                            <span class="error-block">{{$errors->has('tenants') ? $errors->first('tenants') : ''}}</span>
                        </div>
                        <div class="input-field col-xs-12 col-md-6">
                            <i class="mdi mdi-cube-outline prefix"></i>
                            <input type="text" id="unit-autocomplete"
                                   class="autocomplete validate {{$errors->has('unit') ? 'invalid' : ''}}"
                                   name="unit_name"
                                   value="{{old('unit_name')}}" autocomplete="off">
                            <label for="unit-autocomplete" class="active">Einheit</label>
                            <span class="error-block">{{$errors->has('unit') ? $errors->first('unit') : ''}}</span>
                            @if(count($units) === 0)
                                <span style="display:block; margin: 6px 0 0 3rem; color:#e0b050; font-size:.8rem;">
                                    <i class="mdi mdi-information-outline"></i>
                                    Keine freien Einheiten verfügbar — alle Einheiten haben einen laufenden Mietvertrag.
                                </span>
                            @endif
                        </div>
                        <div class="input-field col-xs-12 col-md-6">
                            <i class="mdi mdi-calendar-today prefix"></i>
                            <input type="date" class="{{$errors->has('move-in-date') ? 'invalid' : ''}}"
                                   id="move-in-date" name="move-in-date"
                                   value="{{old('move-in-date')}}">
                            <span class="error-block">{{$errors->has('move-in-date') ? $errors->first('move-in-date') : ''}}</span>
                            <label for="move-in-date" class="active">Einzugsdatum</label>
                        </div>
                        <div class="input-field col-xs-12 col-md-6">
                            <i class="mdi mdi-calendar-range prefix"></i>
                            <input type="date" class="{{$errors->has('move-out-date') ? 'invalid' : ''}}"
                                   id="move-out-date" name="move-out-date"
                                   value="{{old('move-out-date')}}">
                            <span class="error-block">{{$errors->has('move-out-date') ? $errors->first('move-out-date') : ''}}</span>
                            <label for="move-out-date" class="active">Auszugsdatum</label>
                        </div>
                        <div class="input-field col-xs-12 col-md-6">
                            <i class="mdi mdi-currency-eur prefix"></i>
                            <input type="number" step="0.01" min="0" id="rent" name="rent"
                                   class="validate {{$errors->has('rent') ? 'invalid' : ''}}"
                                   value="{{old('rent')}}">
                            <label for="rent" class="active">Kaltmiete</label>
                            <span class="error-block">{{$errors->has('rent') ? $errors->first('rent') : ''}}</span>
                        </div>
                        <div class="input-field col-xs-12 col-md-6">
                            <i class="mdi mdi-security-home prefix"></i>
                            <input type="number" step="0.01" min="0" id="deposit" name="deposit"
                                   class="validate {{$errors->has('deposit') ? 'invalid' : ''}}"
                                   value="{{old('deposit')}}">
                            <label for="deposit" class="active"
                                   data-error="{{ $errors->has('deposit') ? $errors->first('deposit') : '' }}">Sollkaution</label>
                            <span class="error-block">{{$errors->has('deposit') ? $errors->first('deposit') : ''}}</span>
                        </div>
                        <div class="input-field col-xs-12 col-md-6">
                            <i class="mdi mdi-delete prefix"></i>
                            <input type="number" step="0.01" min="0" id="bk-advance" name="bk-advance"
                                   class="validate {{ $errors->has('bk-advance') ? 'invalid' : '' }}"
                                   value="{{old('bk-advance')}}">
                            <label for="bk-advance" class="active">Nebenkosten Vorauszahlung</label>
                            <span class="error-block">{{$errors->has('bk-advance') ? $errors->first('bk-advance') : ''}}</span>
                        </div>
                        <div class="input-field col-xs-12 col-md-6">
                            <i class="mdi mdi-radiator prefix"></i>
                            <input type="number" step="0.01" min="0" id="hk-advance" name="hk-advance"
                                   class="validate {{$errors->has('hk-advance') ? 'invalid' : ''}}"
                                   value="{{old('hk-advance')}}">
                            <label for="hk-advance" class="active">Heizkosten Vorauszahlung</label>
                            <span class="error-block">{{$errors->has('hk-advance') ? $errors->first('hk-advance') : ''}}</span>
                        </div>
                        <div class="input-field col-xs-12 end-xs">
                            <button class="btn waves-effect waves-light" type="submit">Hinzufügen
                                <i class="mdi mdi-plus left"></i>
                            </button>
                        </div>
                        <input type="hidden" name="unit" id="unit" value="{{old('unit')}}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@php
    $now = date_create();
    $unitEntriesPayload = [];
    foreach ($units as $unitRow) {
        $unit = (array) $unitRow;
        // NULL / zero-date MIETVERTRAG_BIS means the unit has no (ending)
        // contract — date_create(null) would yield "now" and render a bogus
        // briefcase date, so skip the end-date tag in that case.
        $end = null;
        if (!empty($unit['MIETVERTRAG_BIS']) && $unit['MIETVERTRAG_BIS'] !== '0000-00-00') {
            $end = date_create($unit['MIETVERTRAG_BIS']);
        }
        $posttag = '';
        switch ($unit['TYP']) {
            case 'Wohnraum':
                $posttag .= '<i class="mdi mdi-home"></i> ';
                break;
            case 'Gewerbe':
                $posttag .= '<i class="mdi mdi-store"></i> ';
                break;
            case 'Stellplatz':
                $posttag .= '<i class="mdi mdi-car"></i> ';
                break;
            default:
                $posttag .= ' (' . $unit['TYP'] . ')';
        }
        if ($end !== null && $end !== false && $end > $now) {
            $posttag .= '<i class="mdi mdi-briefcase"></i> ' . date_format($end, 'd.m.Y');
        }

        $unitEntriesPayload[] = [
            'label' => $unit['EINHEIT_KURZNAME'],
            'id' => (int) $unit['EINHEIT_ID'],
            'posttag' => $posttag,
            'link' => route('web::uebersicht::legacy', ['anzeigen' => 'einheit', 'einheit_id' => $unit['EINHEIT_ID']], false)
        ];
    }

    $tenantChipEntriesPayload = [];
    foreach (old('tenants', []) as $id => $tenant) {
        $tenantChipEntriesPayload[] = [
            'id' => (int) $id,
            'tag' => $tenant
        ];
    }

    $tenantAutocompleteEntriesPayload = [];
    foreach ($tenants as $tenant) {
        $tenantAutocompleteEntriesPayload[] = [
            'label' => trim($tenant['name']) . ', ' . trim($tenant['first_name']),
            'id' => (int) $tenant['id']
        ];
    }

    $jsonFlags = JSON_UNESCAPED_UNICODE
        | JSON_UNESCAPED_SLASHES
        | JSON_INVALID_UTF8_SUBSTITUTE
        | JSON_HEX_TAG
        | JSON_HEX_AMP
        | JSON_HEX_APOS
        | JSON_HEX_QUOT;

    $unitEntriesJson = json_encode($unitEntriesPayload, $jsonFlags);
    $tenantChipEntriesJson = json_encode($tenantChipEntriesPayload, $jsonFlags);
    $tenantAutocompleteEntriesJson = json_encode($tenantAutocompleteEntriesPayload, $jsonFlags);

    if ($unitEntriesJson === false) {
        $unitEntriesJson = '[]';
    }
    if ($tenantChipEntriesJson === false) {
        $tenantChipEntriesJson = '[]';
    }
    if ($tenantAutocompleteEntriesJson === false) {
        $tenantAutocompleteEntriesJson = '[]';
    }

    $unitEntriesJsonB64 = base64_encode($unitEntriesJson);
    $tenantChipEntriesJsonB64 = base64_encode($tenantChipEntriesJson);
    $tenantAutocompleteEntriesJsonB64 = base64_encode($tenantAutocompleteEntriesJson);
@endphp
<script>
    $(document).ready(function () {
        function parseB64Json(base64Value) {
            try {
                return JSON.parse(window.atob(base64Value));
            } catch (e) {
                return [];
            }
        }

        var unitEntries = parseB64Json('{!! $unitEntriesJsonB64 !!}');
        var tenantChipEntries = parseB64Json('{!! $tenantChipEntriesJsonB64 !!}');
        var tenantAutocompleteEntries = parseB64Json('{!! $tenantAutocompleteEntriesJsonB64 !!}');

        var $form = $('form');
        var $unitInput = $('#unit-autocomplete');
        var $unitIdInput = $('#unit');
        var $unitDropdown = $('<ul class="dropdown-content" style="display:none; position:absolute; z-index:2000; max-height:280px; overflow:auto;"></ul>');
        var activeUnitIndex = -1;
        var visibleUnits = [];

        $('body').append($unitDropdown);

        function syncSelectedUnit() {
            var current = $.trim($unitInput.val());
            var exactMatch = null;

            $.each(unitEntries, function (_, unit) {
                if (unit.label === current) {
                    exactMatch = unit;
                    return false;
                }
            });

            $unitIdInput.val(exactMatch ? exactMatch.id : '');
            return exactMatch;
        }

        function positionUnitDropdown() {
            var offset = $unitInput.offset();
            if (!offset) {
                return;
            }

            $unitDropdown.css({
                top: offset.top + $unitInput.outerHeight(),
                left: offset.left,
                width: $unitInput.outerWidth()
            });
        }

        function setActiveUnit(index) {
            activeUnitIndex = index;
            $unitDropdown.children('li').removeClass('active');
            if (activeUnitIndex >= 0) {
                $unitDropdown.children('li').eq(activeUnitIndex).addClass('active');
            }
        }

        function selectUnit(unit) {
            $unitInput.val(unit.label);
            $unitIdInput.val(unit.id);
            $unitDropdown.hide();
            visibleUnits = [];
            activeUnitIndex = -1;
        }

        function renderUnitSuggestions() {
            var normalized = $.trim($unitInput.val()).toLowerCase();
            $unitDropdown.empty();
            activeUnitIndex = -1;

            if (normalized === '') {
                $unitDropdown.hide();
                visibleUnits = [];
                syncSelectedUnit();
                return;
            }

            visibleUnits = unitEntries.filter(function (unit) {
                return unit.label && unit.label.toLowerCase().indexOf(normalized) !== -1;
            }).slice(0, 30);

            if (!visibleUnits.length) {
                $unitDropdown.hide();
                syncSelectedUnit();
                return;
            }

            $.each(visibleUnits, function (index, unit) {
                var $item = $('<li style="padding:10px 12px; cursor:pointer;"></li>');
                var $text = $('<div></div>').text(unit.label);
                var $meta = $('<div style="font-size:.85rem; color:#9fb3ba;"></div>').html(unit.posttag || '');

                $item.append($text).append($meta);
                $item.on('mouseenter', function () {
                    setActiveUnit(index);
                });
                $item.on('mousedown', function (e) {
                    e.preventDefault();
                    selectUnit(unit);
                });

                $unitDropdown.append($item);
            });

            positionUnitDropdown();
            $unitDropdown.show();
            syncSelectedUnit();
        }

        $unitInput.on('focus input', function () {
            renderUnitSuggestions();
        }).on('keydown', function (e) {
            if (!$unitDropdown.is(':visible')) {
                if (e.which === 40) {
                    renderUnitSuggestions();
                }
                return;
            }

            if (e.which === 40) {
                e.preventDefault();
                setActiveUnit(Math.min(activeUnitIndex + 1, visibleUnits.length - 1));
            } else if (e.which === 38) {
                e.preventDefault();
                setActiveUnit(Math.max(activeUnitIndex - 1, 0));
            } else if (e.which === 13) {
                if (activeUnitIndex >= 0 && visibleUnits[activeUnitIndex]) {
                    e.preventDefault();
                    selectUnit(visibleUnits[activeUnitIndex]);
                }
            } else if (e.which === 27) {
                $unitDropdown.hide();
            }
        }).on('blur', function () {
            syncSelectedUnit();
            setTimeout(function () {
                $unitDropdown.hide();
            }, 120);
        });

        $(window).on('resize scroll', function () {
            if ($unitDropdown.is(':visible')) {
                positionUnitDropdown();
            }
        });

        $(document).on('mousedown.unit-autocomplete', function (e) {
            if (!$(e.target).closest($unitDropdown).length && !$(e.target).is($unitInput)) {
                $unitDropdown.hide();
                syncSelectedUnit();
            }
        });

        syncSelectedUnit();

        var tenantByLabel = {};
        $.each(tenantAutocompleteEntries, function (_, tenant) {
            tenantByLabel[tenant.label] = tenant.id;
        });

        var $tenantContainer = $('#tenant-autocomplete');
        $tenantContainer.empty();
        var $tenantChips = $('<div class="chips-selected" style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:8px;"></div>');
        var $tenantInput = $('<input type="text" id="tenant-input" list="tenant-options" placeholder="Mieter eingeben" style="color:#eceff1; border-bottom:1px solid #3a4147; width:100%;">');
        var $tenantOptions = $('<datalist id="tenant-options"></datalist>');
        $.each(tenantAutocompleteEntries, function (_, tenant) {
            $tenantOptions.append($('<option></option>').attr('value', tenant.label));
        });
        $tenantContainer.append($tenantChips).append($tenantInput).append($tenantOptions);

        function addTenantChip(id, label) {
            if (!id || !label || $('#tenant_' + id).length) {
                return;
            }

            var $chip = $('<span class="chip" data-tenant-id="' + id + '"></span>').text(label + ' ');
            var $close = $('<i class="material-icons close" style="cursor:pointer;">close</i>');
            $close.on('click', function () {
                $('#tenant_' + id).remove();
                $chip.remove();
            });
            $chip.append($close);
            $tenantChips.append($chip);

            $('<input>').attr({
                type: 'hidden',
                id: 'tenant_' + id,
                name: 'tenants[' + id + ']'
            }).val(label).appendTo($form);
        }

        function tryAddTypedTenant() {
            var label = $.trim($tenantInput.val());
            if (!label || !tenantByLabel[label]) {
                return;
            }

            addTenantChip(tenantByLabel[label], label);
            $tenantInput.val('');
        }

        $tenantInput.on('keydown', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                tryAddTypedTenant();
            }
        }).on('blur', function () {
            tryAddTypedTenant();
        });

        $.each(tenantChipEntries, function (_, chip) {
            var id = chip.id || tenantByLabel[chip.tag];
            if (id) {
                addTenantChip(id, chip.tag);
            }
        });

        Materialize.updateTextFields();
    });
</script>
@endpush