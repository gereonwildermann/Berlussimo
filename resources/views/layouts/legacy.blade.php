<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href='{{mix('css/vendor.css')}}' rel='stylesheet' type='text/css'>
    @stack('head')
    <link href='{{mix('css/main.css')}}' rel='stylesheet' type='text/css'>
    <link href='{{mix('css/berlussimo.css')}}' rel='stylesheet' type='text/css'>
    <link href='{{mix('css/materialize-css.css')}}' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .application--wrap {
            min-height: auto;
        }

        /* --- Modern dark styling for legacy content forms --- */
        .berlussimo-materialize .card-panel {
            background: #262a2e;
            border: 1px solid #363c42;
            border-radius: 10px;
            padding: 26px 30px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .35);
        }

        .berlussimo-materialize .input-field {
            margin-top: 1.4rem;
            margin-bottom: 2.4rem;
        }

        .berlussimo-materialize .input-field > label {
            color: #93a1a6;
        }

        .berlussimo-materialize .input-field > label.active {
            color: #28b8b4;
        }

        .berlussimo-materialize .input-field input[type=text],
        .berlussimo-materialize .input-field input[type=number],
        .berlussimo-materialize .input-field input[type=date],
        .berlussimo-materialize .input-field input:not([type]) {
            color: #eceff1 !important;
            border-bottom: 1px solid #3a4147 !important;
            box-shadow: none !important;
        }

        .berlussimo-materialize .input-field input:focus:not([readonly]) {
            border-bottom: 1px solid #28b8b4 !important;
            box-shadow: 0 1px 0 0 #28b8b4 !important;
        }

        .berlussimo-materialize .input-field i.prefix {
            color: #6b7a80;
        }

        .berlussimo-materialize .input-field i.prefix.active {
            color: #28b8b4;
        }

        /* Validation messages: sit cleanly below the field instead of
           overlapping/wrapping character-by-character. Empty ones collapse. */
        .berlussimo-materialize .error-block {
            display: block;
            position: static;
            width: 100%;
            clear: both;
            margin: 6px 0 0 3rem;
            color: #ff6e6e;
            font-size: .76rem;
            line-height: 1.35;
            white-space: normal;
        }

        .berlussimo-materialize .error-block:empty {
            display: none;
            margin: 0;
        }

        .berlussimo-materialize .btn,
        .berlussimo-materialize button[type=submit],
        .berlussimo-materialize .btn.waves-effect {
            background-color: #28b8b4 !important;
            color: #06312f !important;
            font-weight: 700;
            border-radius: 6px;
        }

        .berlussimo-materialize .btn i,
        .berlussimo-materialize button[type=submit] i {
            color: #06312f !important;
        }

        .berlussimo-materialize .btn:hover,
        .berlussimo-materialize button[type=submit]:hover {
            background-color: #34cbc6 !important;
        }

        .berlussimo-materialize .chips {
            border-bottom: 1px solid #3a4147;
            min-height: 2.6rem;
        }

        .berlussimo-materialize .chip {
            background: #37474f;
            color: #eceff1;
        }
    </style>
</head>

<body style="display: flex; min-height: 100vh; flex-direction: column;">

<div id="top" style="position: sticky; top: 0; z-index: 2">
    <v-app dark>
        @if(Auth::check())
            <app-user-loader :user="{{Auth::user()}}"></app-user-loader>
            <app-global-select-loader
                    :partner="{{session()->has('partner_id') ? \App\Models\Partner::find(session()->get('partner_id')) : 'null'}}"
                    :objekt="{{ session()->has('objekt_id') ? \App\Models\Objekte::find(session()->get('objekt_id')) : 'null'}}"
                    :bankkonto="{{ session()->has('geldkonto_id') ? \App\Models\Bankkonten::find(session()->get('geldkonto_id')) : 'null'}}">
            </app-global-select-loader>
            <app-legacy-loader :is-legacy="true"></app-legacy-loader>
        @endif
        <app-toolbar></app-toolbar>
        <app-menu v-cloak>
            <div slot="mainmenu">@include('shared.menus.main')</div>
            <div v-cloak slot="submenu">
                <?php include(base_path($submenu)); ?>
            </div>
        </app-menu>
        <div>
            @include("shared.messages")
        </div>
    </v-app>
</div>

<div class="application theme--dark content" style="flex: 1 0 auto; flex-direction: column">
    @if($content != "")
        <div class="berlussimo-materialize container fluid">
            {!!$content!!}
        </div>
    @else
        <div class="berlussimo-materialize container fluid">
            @yield('content')
        </div>
    @endif
    @if(Auth::check())
        <app-notifications id="notifications" style="z-index: 1000"></app-notifications>
        <app-snackbar id="snackbar" style="z-index: 1010"></app-snackbar>
    @endif
</div>

<div id="bottom">
    <v-app dark>
        <app-footer></app-footer>
    </v-app>
</div>

<script type='text/javascript' src='/js/jquery.min.js'></script>
<script type='text/javascript' src='{{mix('js/manifest.js')}}'></script>
<script type='text/javascript' src='{{mix('js/vendor.js')}}'></script>
<script type='text/javascript' src='{{mix('js/app-materialize.js')}}'></script>
{{-- jQuery must be global before materialize.js and the form plugins below --}}
<script type='text/javascript' src='/js/jquery.min.js'></script>
<script type='text/javascript' src='{{mix('js/materialize.js')}}'></script>
<script type='text/javascript' src='/js/materialize_autocomplete.js'></script>
<script type='text/javascript' src='/js/materialize_chips_autocomplete.js'></script>
<script type='text/javascript' src='{{mix('js/legacy.js')}}'></script>
@stack('scripts')

</body>
</html>