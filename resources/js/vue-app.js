import Vue from 'vue'
import VueRouter from 'vue-router';
import Responses from "./components/Responses";
import Response from "./components/Response";
import { routes } from './routes';

Vue.component('responses', require('./components/Responses.vue').default);


Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});

new Vue({
  el: '#app',
  router,
  components : {
        Responses,
        Response,
  },

  methods : {
      getLink(ev){
          let lastPiece = this.$route.fullPath.split('/').pop()
          
          if (lastPiece == 'responses'){
              ev.target.href = '/user/docs'
          }
          else {
              this.$router.go(-1);
              ev.preventDefault()
          }
      }
  }

});