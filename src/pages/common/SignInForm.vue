<template>
  <div class="sign-in-form">
    <h1 class="auth-title">Sign In</h1>
    <p>Please enter your email and password</p>
    <div class="sign-in-form__form">
      <div class="sign-in-form__form__inputs">
        <el-input type="text" placeholder="Email" v-model="email" class="auth-input"></el-input>
        <el-input type="text" placeholder="Password" v-model="password" show-password class="auth-input"></el-input>
      </div>

      <div class="sign-in-form__form__buttons">
        <el-button type="primary" v-on:click="submit" class="auth-button">Sign In</el-button>
      </div>

      <p>Forgot your password? <router-link  class="auth-link" to="?forgot-password">Click here to send a password reset email</router-link></p>
      <p>Don't have an account? <router-link class="auth-link"  to="">Click here to Sign Up</router-link></p>
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
          .el-button {
            margin-right:10px;
          }
        }
      }
    }
</style>
