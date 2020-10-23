import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'

import VueFbCustomerChat from 'vue-fb-customer-chat'

Vue.use(VueFbCustomerChat, {
  page_id: 101743478403033, //  change 'null' to your Facebook Page ID,
  theme_color: '#333333', // theme color in HEX
  locale: 'en_US', // default 'en_US'
})



import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

import Carousel3d from 'vue-carousel-3d';
Vue.use(Carousel3d);

import VuePhoneNumberInput from 'vue-phone-number-input';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';

Vue.component('vuephone', VuePhoneNumberInput);


import '~/plugins'
import '~/components'
import KProgress from 'k-progress';
Vue.component('k-progress', KProgress);
Vue.config.productionTip = false


/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
