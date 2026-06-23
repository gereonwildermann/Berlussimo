<template>
    <component v-if="menu" :is="menu"></component>
</template>

<script lang="ts">
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import axios from '../../../libraries/axios';
    import {Prop} from "vue-property-decorator";

    // Cache menu HTML by URL so subsequent navigations don't re-fetch and
    // don't show a blank menu while the request is in flight.
    const menuCache: Record<string, string> = {};

    @Component
    export default class Menu extends Vue {

        menu: Object | null = null;

        @Prop({type: String, default: ''})
        url: string;

        mounted() {
            if (!this.url) return;
            if (menuCache[this.url]) {
                this.menu = { template: menuCache[this.url] };
                return;
            }
            axios.get(this.url).then(response => {
                menuCache[this.url] = response.data;
                this.menu = { template: response.data };
            });
        }
    }
</script>