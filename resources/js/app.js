/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./tagsinput');
require('./typeahead.bundle.min');
require('./bloodhound.min');
require('./bootstrap-tagsinput.min');
require('select2');
require('../../node_modules/bootstrap-select/dist/js/bootstrap-select.min');
require('../../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker');
require('../../node_modules/bootstrap-slider/dist/bootstrap-slider.min');
require('slick-carousel');

window.route = require('./route');

window.Vue = require('vue');
import languageBundle from '@kirschbaum-development/laravel-translations-loader/php!@kirschbaum-development/laravel-translations-loader';
import VueI18n from 'vue-i18n';
Vue.use(VueI18n);

const i18n = new VueI18n({
    locale: 'pl',
    messages: languageBundle,
});

Vue.prototype.trans = (key) => {
    return _.get(window.trans, key, key);
};

import Toasted from 'vue-toasted'
Vue.use(Toasted, {
  duration: 1000
})

import { ValidationProvider, ValidationObserver, extend, localize } from 'vee-validate';
import { VueTagsInput } from '@johmun/vue-tags-input';
import tinymce from 'vue-tinymce-editor';
import * as rules from 'vee-validate/dist/rules';
import en from 'vee-validate/dist/locale/en.json';
import de from 'vee-validate/dist/locale/de.json';
import uk from 'vee-validate/dist/locale/uk.json';
import pl from 'vee-validate/dist/locale/pl.json';
import Datepicker from 'vuejs-datepicker';

Object.keys(rules).forEach(rule => {
  extend(rule, rules[rule]);
});
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);
Vue.component('VueTagsInput', VueTagsInput);
Vue.component('tinymce', tinymce);
Vue.component('Datepicker', Datepicker);

var userLang = navigator.language || navigator.userLanguage;

if(String(Laravel.Locale) === 'ukr' || userLang === 'uk')
{
    localize(
        'uk', uk
    );
} else if(String(Laravel.Locale) === 'pl'|| userLang === 'pl-PL') {
    localize(
        'pl', pl
    );
} else if(String(Laravel.Locale) === 'en' || userLang === 'en' || userLang === 'en-GB') {
    localize(
        'en', en
    );
} else if(String(Laravel.Locale) === 'de' || userLang === 'de') {
    localize(
        'de', de
    );
}
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import CompanyRegister from './components/CompanyRegister.vue';
Vue.component('company-register', CompanyRegister);
import CreateOffer from './components/offers/CreateOffer.vue';
Vue.component('create-offer', CreateOffer);
import EditOffer from './components/offers/EditOffer.vue';
Vue.component('edit-offer', EditOffer);
import SimilarOffer from './components/offers/SimilarOffer.vue';
Vue.component('similar-offer', SimilarOffer);
import CourseRegister from './components/CourseRegister.vue';
Vue.component('course-register', CourseRegister);
import EditCourse from './components/courses/EditCourse.vue';
Vue.component('edit-course', EditCourse);
import CreateCourse from './components/courses/CreateCourse.vue';
Vue.component('course-create', CreateCourse);
import SimilarForeign from './components/foreigns/SimilarForeign.vue';
Vue.component('similar-foreign', SimilarForeign);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    i18n: i18n
});

$(document).ready(function() {
    if(window.innerWidth > 756) {
        $('#description').bind("copy",function(e) {
            e.preventDefault();
        });
    }
    
    window.scrollTo(0, 0);
    require('./notification');
    require('./range');
    require('./inputmask');
    require('./datepicker');
    require('./select2-init');
    require('./selectpicker');
    require('./theme');

    $(function () {
        $('#selectBox').change(function () {
            window.location.hash = '#' + $(this).val();
        });
    });

    require('./session');
    require('./returnTop');
    require('./sliders');
    require('./tabs');
    require('./menuTogglerWithTooltip');
    require('./dropzone');
});

require('./questionnaire');
