// js for all pages

import Vue from 'vue';
import vueInvoker from '../util/vueInvoker';
import vueCollection from '../vue/collection';

//adds bootstrap.js from node_modules
import 'bootstrap';

export default {
    init() {
        // JavaScript to be fired on all pages

        vueInvoker.init(Vue, vueCollection);
    },
    finalize() {
        // JavaScript to be fired on all pages, after page specific JS is fired
    },
};
