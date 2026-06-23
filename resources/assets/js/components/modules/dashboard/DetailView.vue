<template>
    <div></div>
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
