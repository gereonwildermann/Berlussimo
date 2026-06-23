<div class="b-nav-grid">
    @can(\App\Libraries\Permission::PERMISSION_MODUL_PARTNER)
        <a href='{{route('web::partner::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-account-group"></i></span>
            <span class="b-nav-item__label">Partner</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_OBJEKT)
        <router-link :to="{name: 'web.objects.index'}" class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-city"></i></span>
            <span class="b-nav-item__label">Objekte</span>
        </router-link>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_HAUS)
        <router-link :to="{name: 'web.houses.index'}" class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-home-modern"></i></span>
            <span class="b-nav-item__label">Häuser</span>
        </router-link>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_EINHEIT)
        <router-link :to="{name: 'web.units.index'}" class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-floor-plan"></i></span>
            <span class="b-nav-item__label">Einheiten</span>
        </router-link>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_MIETVERTRAG)
        <a href='{{route('web::mietvertraege::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-file-document"></i></span>
            <span class="b-nav-item__label">Mietverträge</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_PERSON)
        <router-link :to="{name: 'web.persons.index'}" class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-account"></i></span>
            <span class="b-nav-item__label">Personen</span>
        </router-link>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_PERSONAL)
        <a href='{{route('web::personal::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-briefcase"></i></span>
            <span class="b-nav-item__label">Personal</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_DETAIL)
        <a href='{{route('web::details::legacy', ['option' => 'detail_suche'])}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-tag-multiple"></i></span>
            <span class="b-nav-item__label">Details</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_MIETVERTRAG)
        <a href='{{route('web::mietkontenblatt::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-cash-multiple"></i></span>
            <span class="b-nav-item__label">Miete</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_RECHNUNG)
        <a href='{{route('web::rechnungen::legacy', ['option' => 'erfasste_rechnungen'])}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-receipt"></i></span>
            <span class="b-nav-item__label">Rechnungen</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_KATALOG)
        <a href='{{route('web::katalog::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-book-open-variant"></i></span>
            <span class="b-nav-item__label">Katalog</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_KONTENRAHMEN)
        <a href='{{route('web::kontenrahmen::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-table-of-contents"></i></span>
            <span class="b-nav-item__label">Kontenrahmen</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_BANKKONTO)
        <a href='{{route('web::geldkonten::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-bank"></i></span>
            <span class="b-nav-item__label">Geldkonten</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_KASSE)
        <a href='{{route('web::kassen::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-cash"></i></span>
            <span class="b-nav-item__label">Kassen</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_LAGER)
        <a href='{{route('web::lager::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-home-variant"></i></span>
            <span class="b-nav-item__label">Lager</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_BUCHEN)
        <a href='{{route('web::buchen::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-file-check"></i></span>
            <span class="b-nav-item__label">Buchen</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_LEERSTAND)
        <a href='{{route('web::leerstand::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-home-alert"></i></span>
            <span class="b-nav-item__label">Leerstände</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_STATISTIK)
        <a href='{{route('web::statistik::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-chart-bar"></i></span>
            <span class="b-nav-item__label">Statistik</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_ZEITERFASSUNG)
        <a href='{{route('web::zeiterfassung::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-clock"></i></span>
            <span class="b-nav-item__label">Zeiterfassung</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_URLAUB)
        <a href='{{route('web::urlaub::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-beach"></i></span>
            <span class="b-nav-item__label">Urlaub</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_KAUTION)
        <a href='{{route('web::kautionen::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-shield"></i></span>
            <span class="b-nav-item__label">Kautionen</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_BETRIEBSKOSTEN)
        <a href='{{route('web::bk::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-flash"></i></span>
            <span class="b-nav-item__label">BK & NK</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_SEPA)
        <a href='{{route('web::sepa::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-transfer"></i></span>
            <span class="b-nav-item__label">SEPA</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_BENUTZER)
        <a href='{{route('web::benutzer::legacy', ['option' => 'werkzeuge'])}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-wrench"></i></span>
            <span class="b-nav-item__label">Werkzeuge</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_WEG)
        <a href='{{route('web::weg::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-home-modern"></i></span>
            <span class="b-nav-item__label">WEG</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_AUFTRAEGE)
        <router-link :to="{name: 'web.assignments.index'}" class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-format-list-bulleted"></i></span>
            <span class="b-nav-item__label">Aufträge</span>
        </router-link>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_AUFTRAEGE)
        <a href='{{route('web::construction::legacy')}}' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-crane"></i></span>
            <span class="b-nav-item__label">Baustellen</span>
        </a>
    @endcan

    @can(\App\Libraries\Permission::PERMISSION_MODUL_WARTUNG)
        <a href='/wartungsplaner/' target='new' class="b-nav-item">
            <span class="b-nav-item__icon"><i class="mdi mdi-wrench"></i></span>
            <span class="b-nav-item__label">Wartungsplaner</span>
        </a>
    @endcan
</div>
