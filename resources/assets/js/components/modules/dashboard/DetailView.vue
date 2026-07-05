<template>
    <v-container fluid class="b-dashboard">
        <div class="b-dashboard__grid">
            <router-link class="b-dash-card" :to="{name: 'web.objects.index'}">
                <div class="b-dash-card__icon"><i class="mdi mdi-city"></i></div>
                <div class="b-dash-card__label">Objekte</div>
            </router-link>
            <router-link class="b-dash-card" :to="{name: 'web.houses.index'}">
                <div class="b-dash-card__icon"><i class="mdi mdi-home-modern"></i></div>
                <div class="b-dash-card__label">Häuser</div>
            </router-link>
            <router-link class="b-dash-card" :to="{name: 'web.units.index'}">
                <div class="b-dash-card__icon"><i class="mdi mdi-floor-plan"></i></div>
                <div class="b-dash-card__label">Einheiten</div>
            </router-link>
            <router-link class="b-dash-card" :to="{name: 'web.persons.index'}">
                <div class="b-dash-card__icon"><i class="mdi mdi-account-group"></i></div>
                <div class="b-dash-card__label">Personen</div>
            </router-link>
            <router-link class="b-dash-card" :to="{name: 'web.assignments.index'}">
                <div class="b-dash-card__icon"><i class="mdi mdi-clipboard-check"></i></div>
                <div class="b-dash-card__label">Aufgaben</div>
            </router-link>
            <a class="b-dash-card" href="/mietvertraege">
                <div class="b-dash-card__icon"><i class="mdi mdi-file-document"></i></div>
                <div class="b-dash-card__label">Mietverträge</div>
            </a>
            <a class="b-dash-card" href="/mietkontenblatt">
                <div class="b-dash-card__icon"><i class="mdi mdi-cash-multiple"></i></div>
                <div class="b-dash-card__label">Miete</div>
            </a>
            <a class="b-dash-card" href="/rechnungen">
                <div class="b-dash-card__icon"><i class="mdi mdi-receipt"></i></div>
                <div class="b-dash-card__label">Rechnungen</div>
            </a>
            <a class="b-dash-card" href="/buchen">
                <div class="b-dash-card__icon"><i class="mdi mdi-book-open-variant"></i></div>
                <div class="b-dash-card__label">Buchen</div>
            </a>
            <a class="b-dash-card" href="/partner">
                <div class="b-dash-card__icon"><i class="mdi mdi-briefcase"></i></div>
                <div class="b-dash-card__label">Partner</div>
            </a>
            <a class="b-dash-card" href="/kautionen">
                <div class="b-dash-card__icon"><i class="mdi mdi-shield"></i></div>
                <div class="b-dash-card__label">Kautionen</div>
            </a>
            <a class="b-dash-card" href="/sepa">
                <div class="b-dash-card__icon"><i class="mdi mdi-bank"></i></div>
                <div class="b-dash-card__label">SEPA</div>
            </a>
            <a class="b-dash-card" href="/bk">
                <div class="b-dash-card__icon"><i class="mdi mdi-home-alert"></i></div>
                <div class="b-dash-card__label">BK & NK</div>
            </a>
            <a class="b-dash-card" href="/statistik">
                <div class="b-dash-card__icon"><i class="mdi mdi-chart-bar"></i></div>
                <div class="b-dash-card__label">Statistik</div>
            </a>
        </div>
    </v-container>
</template>

<script lang="ts">
    import Vue from "vue";
    import Component from "vue-class-component";
    import {Mutation, namespace, State} from "vuex-class";
    import {Watch} from "vue-property-decorator";

    const RefreshState = namespace('shared/refresh', State);
    const RefreshMutation = namespace('shared/refresh', Mutation);

    @Component
    export default class DetailView extends Vue {

        @RefreshState('dirty')
        dirty;

        @RefreshMutation('refreshFinished')
        refreshFinished: Function;

        @Watch('dirty')
        onDirtyChange() {
            this.refreshFinished();
        }
    }
</script>

<style>
    .b-dashboard {
        padding: 32px 24px;
    }

    .b-dashboard__grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
        gap: 16px;
        max-width: 900px;
        margin: 0 auto;
    }

    .b-dash-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 24px 12px 20px;
        border-radius: 12px;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        text-decoration: none;
        cursor: pointer;
        transition: background 0.15s, border-color 0.15s, transform 0.12s;
    }

    .b-dash-card:hover {
        background: rgba(255,255,255,0.09);
        border-color: rgba(77,208,204,0.4);
        transform: translateY(-2px);
    }

    .b-dash-card__icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: rgba(40,184,180,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        color: #4dd0cc;
    }

    .b-dash-card__label {
        font-size: 13px;
        font-weight: 500;
        color: rgba(255,255,255,0.75);
        text-align: center;
        line-height: 1.3;
    }
</style>
