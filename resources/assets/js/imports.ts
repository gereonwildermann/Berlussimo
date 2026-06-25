import Vue from "vue";
import VueRouter from "vue-router";
import Vuex from "vuex";
import Vuetify from "vuetify";

// Bundle the Vuetify component CSS (must match the Vuetify JS version above)
// and the Material Design Icons webfont. The old webpack build injected these
// at runtime; the Vite build needs them imported so they end up in app.css.
import "vuetify/dist/vuetify.min.css";
import "mdi/css/materialdesignicons.min.css";

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(Vuetify, {
    theme: {
        primary: '#28b8b4',
        accent: '#28b8b4',
        secondary: '#424242'
    }
});

export default Vue;
