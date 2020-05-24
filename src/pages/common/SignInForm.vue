<template>
  <div class="sign-in-form">
    <h1>Sign In</h1>
    <p>Please enter your email and password</p>
    <div class="sign-in-form__form">
      <div class="sign-in-form__form__inputs">
        <input type="text" placeholder="Email" v-model="email" class="auth-input"/>
        <input type="text" placeholder="Password" v-model="password" show-password class="auth-input"/>
      </div>

      <div class="sign-in-form__form__buttons">
        <router-link  to=""><button>Sign Up</button></router-link>
        <button type="primary" v-on:click="submit">Sign In</button>
      </div>

      <p>Forgot your password? <router-link  to="?forgot-password">Click here to send a password reset email</router-link></p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SignInForm',
  props: {},
  methods : {
    async submit(){
        //await this.services("AuthService").signIn({...this.vue.$data});
    }
  },
  data(){
      return {
          email:undefined,
          password:undefined
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
    .sign-in-form {

      &__form {
        
        &__inputs {
          margin-top:30px;
          margin-bottom:30px;
        }

        &__buttons {
          margin-bottom:30px;
        }
      }
    }
</style>
