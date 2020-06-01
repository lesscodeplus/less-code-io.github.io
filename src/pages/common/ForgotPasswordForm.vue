<template>
  <div class="forgot-password-form">
    <div class="forgot-password-form__message">
      <h1 class="auth-title">Recover password</h1>
      <p>Just fill in these three fields to start using our API designer</p>
    </div>
    <div class="forgot-password-form__form">
      <div class="forgot-password-form__form__inputs">
        <el-alert v-if="signUpError" :title="signUpError" type="error" effect="dark" :closable="false" show-icon></el-alert>
        <el-alert v-if="submitted" title="Please check your email, We have sent you an email with a link to reset your password. :) " type="success" effect="dark" :closable="false" show-icon></el-alert>
        <el-form ref="form_forgot" :model="form" :rules="rules">
          <el-form-item prop="email">
            <el-input placeholder="Email" v-model="form.email"></el-input>
          </el-form-item>
          <el-form-item>
            <vue-recaptcha sitekey="6Lfvp_0UAAAAACUAHEN-JgRj_Lqa054XkjG5Dto0" ref="recaptchaForgot" @verify="onRecaptchaVerified" v-show="!recaptchaToken && formValidated" >
              <el-button type="primary" class="auth-button" v-on:click="onSubmit()">Reset</el-button>
            </vue-recaptcha>
            <el-button  v-show="!(!recaptchaToken && formValidated)" type="primary" class="auth-button" v-on:click="onSubmit()">Reset</el-button>
          </el-form-item>
        </el-form>
      </div>

      <p>Remember your credentials? <router-link class="auth-link"  to="?login">Login instead</router-link></p>
    </div>
  </div>
</template>

<script>

import VueRecaptcha from 'vue-recaptcha';
import {getHostAndPort,requiredProp,emailProp} from '../../lib/Common';

export default {
  name: 'ForgotPasswordForm',
  components: { VueRecaptcha },
  methods: {
    async submitForm(){
        if (this.formValidated && this.recaptchaToken){
          const host = getHostAndPort();
          const result = await this.$backendServices.forgotPassword({host, recaptchaToken:this.recaptchaToken,...this.$data.form});
          if (result.error){
            this.signUpError = result.error;
          }else {
            this.submitted = true;
            this.resetForm();
            this.recaptchaToken = undefined;
            this.formValidated = false;
            this.$refs.recaptchaForgot.reset();
            this.signUpError = undefined;
          } 
        }
     
    },
    onRecaptchaVerified(recaptchaToken){
        this.recaptchaToken = recaptchaToken;
        this.submitForm();
    },
    onSubmit(){
      this.$refs.form_forgot.validate((valid) => {
        if (valid){
          this.formValidated = true;
          if (!this.recaptchaToken){
            this.$refs.recaptchaForgot.execute();
          }
          this.submitForm();
        }else {
          this.formValidated = false;
        }
      });
    },
    resetForm() {
      this.$refs.form_forgot.resetFields();
    }
  },
  props: { },
  data(){
      return {
        form: {
          email: "",
        },
        signUpError: undefined,
        formValidated:false,
        recaptchaToken:undefined,
        submitted:false,
        rules: {
            email: [requiredProp('Email address is required'),emailProp()]
        }
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .forgot-password-form {

    @media only screen and (min-width: 768px) and (max-width: 1200px) {   
        display: flex;
        justify-content: flex-start;

      &__message {
        p {
          padding-right:20px;
        }
      }
    }

    &__message {
      width:100%;
      max-width:616px;
    }

    &__form {
      max-width:400px;

      &__inputs{
        
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
