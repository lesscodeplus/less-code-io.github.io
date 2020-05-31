<template>
  <div class="sign-in-form">
    <h1 class="auth-title">Sign In</h1>
    <p>Please enter your email and password</p>
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
            email: [
              { required: true, message: 'Email address is required', trigger: 'blur' },
              { type: 'email', message: 'Please enter a valid email address', trigger: 'blur' },
            ],
            password: [
              { required: true, message: 'Password is required', trigger: 'blur' },
            ]
        },
        signUpError: undefined
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
    .sign-in-form {

      &__form {
        
        &__inputs {
          .el-alert {
            margin-bottom:20px;
          }
          margin-top:30px;
          margin-bottom:30px;
        }

      }
    }
</style>
