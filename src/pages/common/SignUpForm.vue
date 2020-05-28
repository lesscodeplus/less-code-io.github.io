<template>
  <div class="sign-up-form">
    <h1 class="auth-title">Save time and cost by using Less-Code IDE to make APIs without coding</h1>
    <p>It only takes less than a minute to sign up and try out less-code BETA!!!</p>
    <div class="sign-up-form__form">
      <div class="sign-up-form__form__inputs">
        <!-- <el-input type="text" placeholder="User Name" v-model="userName" class="auth-input"></el-input> -->
        <el-input type="text" placeholder="Email" v-model="email" class="auth-input"></el-input>
        <el-input type="text" placeholder="Password" v-model="password" class="auth-input"></el-input>
        <p> By creating an account, you are agreeing to our <router-link class="auth-link" to="terms">Terms of Service</router-link> and <router-link class="auth-link" to="privacy">Privacy Policy.</router-link> </p>
      </div>
      
      
      <div class="sign-up-form__form__buttons">
        <el-button type="primary" class="auth-button" v-on:click="submit">Sign Up</el-button>
      </div>
      
      <p>Already have an account? <router-link class="auth-link"  to="?login">Login instead</router-link></p>
      
    </div>
  </div>
</template>

<script>
export default {
  name: 'SignUpForm',
  props: {},
  methods : {
    async submit(){
        //await this.services("AuthService").signUp({...this.vue.$data});
    }
  },
  data(){
    return {
      userName: undefined,
      email: undefined,
      password: undefined
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.sign-up-form {

  &__form {
    &__inputs {
      margin-top: 30px;
      margin-bottom: 30px;
      p {
        font-size:12px;
      }
    }

    &__buttons {
      display: flex;
      
      margin-bottom: 30px;
    }
  }
}
</style>
