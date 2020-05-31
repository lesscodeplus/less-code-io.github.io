<template>
  <div class="logged-in-form">
   <h1 class="auth-title">Save Time and Effort by Making APIs Without Code</h1>
    <p>You are already logged in as {{authData.profile.email}}, <a href="/ide/">click here</a> to navigate to the IDE</p>

    <p>If you wish to log in as another user <a href="" @click="logOut()">click here</a> to sign out</p>
    
  </div>
</template>

<script>
import {deleteCookie} from '../../lib/Common';

export default {
  name: 'LoggedInForm',
  props: {
    authData:Object
  },
  methods : {
    logOut(){
      deleteCookie();
    }
  },
  data(){
    return {

    }
  },
  computed:{
    name(){
      const profile = this.authData.profile;
      if (profile?.personal){
        const personal = profile?.personal;
        if (personal.firstName){
          if (personal.lastName){
            return `${personal.firstName} ${personal.lastName}`;
          }else {
            return personal.firstName;
          }
        }else {
          if (personal.lastName){
            return personal.lastName;
          }
        }
      }
      return this.authData.email;
      
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

.logged-in-form {

  @media only screen and (max-width: 1200px) {   
      display: flex;
      justify-content: center;
  }
  
  a {
    color:white;
  }
}
</style>
