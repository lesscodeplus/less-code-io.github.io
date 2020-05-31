<template>
  <div class="home-auth hovarable">
    <div class="home-auth__container" v-if="!authData">
      <SignUpForm v-if="showForm==0" />
      <SignInForm v-if="showForm==1"/>
      <ForgotPasswordForm v-if="showForm==2"/>
    </div>
    <div class="home-auth__container" v-if="authData">
      <LoggedInForm :authData="authData" />
    </div>
  </div>
</template>

<script>

import SignUpForm from './SignUpForm';
import SignInForm from './SignInForm';
import ForgotPasswordForm from './ForgotPasswordForm';
import LoggedInForm from './LoggedInForm';

export default {
  name: 'HomeAuth',
  props: { },
  components:{
    SignUpForm,
    SignInForm,
    ForgotPasswordForm,
    LoggedInForm
  },
  methods: {
        routeChanged(to){
        const queryIndex = to.indexOf("?");
        if (queryIndex !== -1){
            const queryParam = to.substring(queryIndex + 1);
            switch(queryParam){
                case "login":
                    this.showForm = 1;
                    break;
                case "forgot-password":
                    this.showForm = 2;
                    break;
            }
        }else {
            this.showForm = 0;
        }
    }
  },
  watch:{
      $route (to){
        this.routeChanged(to.fullPath);
      }
  },
  beforeMount(){
       const localStorageItem = localStorage.getItem("lc_auth");
        if (localStorageItem){
            this.authData = JSON.parse(localStorageItem);
        }
  }, 
  created(){
    this.routeChanged(window.location.hash);
  },
  data(){
      return {
          showForm:0,
          authData: undefined
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
    .home-auth {

    }
</style>
