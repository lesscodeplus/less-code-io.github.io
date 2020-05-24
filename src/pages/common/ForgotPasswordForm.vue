<template>
  <div class="forgot-password-form">
    <h1>Recover password</h1>
    <p>Just fill in these three fields to start using our API designer</p>
    <div class="forgot-password-form__form">
      <div class="forgot-password-form__form__inputs">
        <input type="text" placeholder="Email" v-model="email" class="auth-input"/>
      </div>

      <div class="forgot-password-form__form__buttons">
        <button type="primary" v-on:click="submit">Reset</button>
      </div>

      <p>Remember your credentials? <router-link  to="?login">Login instead</router-link></p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ForgotPasswordForm',
  methods: {
    async submit(){
        //await this.services("AuthService").forgetPassword({...this.vue.$data});
    }
  },
  props: { },
  data(){
      return {
          email:undefined
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .forgot-password-form {
    &__form {
      
      &__inputs{
        margin-top:30px;
        margin-bottom:30px;
      }

      &__buttons {
        margin-bottom:30px;
      }
    }
  }
</style>
