<template>
  <div class="sign-in-form">
    <div class="sign-in-form__message">
      <h1 class="auth-title">Sign In</h1>
      <p>Please enter your email and password</p>
    </div>
    <div class="sign-in-form__form">
      <div class="sign-in-form__form__inputs">
        <el-alert v-if="signUpError" :title="signUpError" type="error" effect="dark" :closable="false" show-icon></el-alert>
        <el-form ref="form_signin" :model="form" :rules="rules">
          <el-form-item prop="email">
            <el-input placeholder="Email" v-model="form.email"></el-input>
          </el-form-item>
          <el-form-item prop="password">
            <el-input placeholder="Password" v-model="form.password" type="password"></el-input>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" class="auth-button" v-on:click="onSubmit()">Sign In</el-button>
          </el-form-item>
        </el-form>
      </div>

      <p>Forgot your password? <router-link  class="auth-link" to="?forgot-password">Click here to send a password reset email</router-link></p>
      <p>Don't have an account? <router-link class="auth-link"  to="">Click here to Sign Up</router-link></p>
    </div>
  </div>
</template>

<script>
import {createCookie} from '../../lib/Common';
import {requiredProp,emailProp} from '../../lib/Common';

export default {
  name: 'SignInForm',
  props: {},
  methods : {
    async submitForm(){
        const result = await this.$backendServices.signIn({...this.$data.form});
        if (result.error){
          this.signUpError = result.error;
        }else {
          createCookie(result);
       } 
     
    },
    onSubmit(){
      this.$refs.form_signin.validate((valid) => {
        if (valid){
          this.submitForm();
        }
      });
    }
  },
  data(){
      return {
        form: {
          email: "",
          password: ""
        },
        rules: {
            email: [requiredProp('Email address is required'),emailProp()],
            password: [requiredProp('Password is required')]
        },
        signUpError: undefined
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
    .sign-in-form {

      @media only screen and (min-width: 768px) and (max-width: 1200px) {  
          display: flex;
          justify-content: flex-start;
      }

      &__message {
        width:100%;
        max-width:616px;
      }

      &__form {
        max-width:400px;
        &__inputs {
          
          @media only screen and (min-width: 1200px) {   
              margin-top: 30px;
              margin-bottom: 30px;
          }

          .el-alert {
            margin-bottom:20px;
          }
          
          margin-bottom:30px;
        }

      }
    }
</style>
