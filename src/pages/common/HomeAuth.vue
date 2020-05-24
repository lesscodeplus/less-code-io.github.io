<template>
  <div class="home-auth">
    <SignUpForm v-if="showForm==0" />
    <SignInForm v-if="showForm==1"/>
    <ForgotPasswordForm v-if="showForm==2"/>
  </div>
</template>

<script>

import SignUpForm from './SignUpForm';
import SignInForm from './SignInForm';
import ForgotPasswordForm from './ForgotPasswordForm';


export default {
  name: 'HomeAuth',
  props: { },
  components:{
    SignUpForm,
    SignInForm,
    ForgotPasswordForm
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
  created(){
    this.routeChanged(window.location.hash);
  },
  data(){
      return {
          showForm:0
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
    .home-auth {
      padding:20px;
      background: #333333;
      border-radius: 10px;
      width:300px;
    }
</style>
