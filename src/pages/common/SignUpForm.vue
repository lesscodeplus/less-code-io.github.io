<template>
  <div class="sign-up-form">
    <h1>Sign up for Free</h1>
    <p>Just fill in these three fields to start using our API designer</p>
    <div class="sign-up-form__form">
      <div class="sign-up-form__form__inputs">
        <el-input type="text" placeholder="Company Name or User Name" v-model="userName" class="auth-input"></el-input>
        <el-input type="text" placeholder="Email" v-model="email" class="auth-input"></el-input>
        <el-input type="text" placeholder="Password" v-model="password" class="auth-input"></el-input>
      </div>
      
      <div class="sign-up-form__form__buttons">
        <el-button type="primary" v-on:click="submit">Sign Up</el-button>
      </div>

      <p>Already have an account? <router-link  to="?login">Login instead</router-link></p>
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
    }

    &__buttons {
      margin-bottom: 30px;
    }
  }
}
</style>
