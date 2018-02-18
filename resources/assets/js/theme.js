import Vue from 'vue'
import Vuetify from 'vuetify'

import 'vuetify/dist/vuetify.min.css'
import './../sass/main.sass'

import colors from 'vuetify/es5/util/colors'

// Configure application theme.

Vue.use(Vuetify, {
    theme: {
        primary: colors.amber.darken2,
        secondary: colors.blue.base,
    }
});
