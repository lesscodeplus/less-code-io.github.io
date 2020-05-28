<template>
  <div class="forgot-password-form">
    <h1 class="auth-title">Recover password</h1>
    <p>Just fill in these three fields to start using our API designer</p>
    <div class="forgot-password-form__form">
      <div class="forgot-password-form__form__inputs">
        <el-input type="text" placeholder="Email" v-model="email" class="auth-input"></el-input>
      </div>

      <div class="forgot-password-form__form__buttons">
        <el-button type="primary" class="auth-button" v-on:click="submit">Reset</el-button>
      </div>

      <p>Remember your credentials? <router-link class="auth-link"  to="?login">Login instead</router-link></p>
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
