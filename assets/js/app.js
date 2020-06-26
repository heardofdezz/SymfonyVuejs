import Vue from 'vue'
import Vuetify from 'vuetify';
import Routes from './routes.js';
import App from './views/App';
import 'vuetify/dist/vuetify.min.css'


Vue.config.productionTip = false
Vue.use(Vuetify);

const app = new Vue({
    vuetify: new Vuetify(),
    el: '#app',
    router: Routes,
    render: h => h(App)
});

export default app;