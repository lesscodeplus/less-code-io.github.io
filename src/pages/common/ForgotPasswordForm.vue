<template>
  <div class="forgot-password-form">
    <h1 class="auth-title">Recover password</h1>
    <p>Just fill in these three fields to start using our API designer</p>
    <div class="forgot-password-form__form">
      <div class="forgot-password-form__form__inputs">
        <el-alert v-if="signUpError" :title="signUpError" type="error" effect="dark" :closable="false" show-icon></el-alert>
        <el-alert v-if="submitted" title="Please check your email, We have sent you an email with a link to reset your password. :) " type="success" effect="dark" :closable="false" show-icon></el-alert>
        <el-form ref="form_forgot" :model="form" :rules="rules">
          <el-form-item prop="email">
            <el-input placeholder="Email" v-model="form.email"></el-input>
          </el-form-item>
          <el-form-item>
            <vue-recaptcha sitekey="6Lfvp_0UAAAAACUAHEN-JgRj_Lqa054XkjG5Dto0" ref="recaptchaForgot" @verify="onRecaptchaVerified" v-show="formValidated" >
              <el-button type="primary" class="auth-button" v-on:click="onSubmit()">Reset</el-button>
            </vue-recaptcha>
            <el-button  v-show="!formValidated" type="primary" class="auth-button" v-on:click="onSubmit()">Reset</el-button>
          </el-form-item>
        </el-form>
      </div>

      <p>Remember your credentials? <router-link class="auth-link"  to="?login">Login instead</router-link></p>
    </div>
  </div>
</template>

<script>

import VueRecaptcha from 'vue-recaptcha';

export default {
  name: 'ForgotPasswordForm',
  components: { VueRecaptcha },
  methods: {
    async submitForm(){
        if (this.formValidated && this.recaptchaValidated){
          const result = await this.$authService.signUp({...this.$data.form});
          if (result.error){
            this.signUpError = result.error;
          }else {
            this.submitted = true;
            this.resetForm();
            this.recaptchaValidated = false;
            this.formValidated = false;
            this.$refs.recaptchaForgot.reset();
            this.signUpError = undefined;
          } 
        }
     
    },
    onRecaptchaVerified(){
        this.recaptchaValidated = true;
        this.submitForm();
    },
    onSubmit(){
      console.log(this.$refs);
      this.$refs.form_forgot.validate((valid) => {
        if (valid){
          this.formValidated = true;
          this.$refs.recaptchaForgot.execute();
          this.submitForm();
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
      recaptchaValidated:false,
      submitted:false,
      rules: {
          email: [
            { required: true, message: 'Email address is required', trigger: 'blur' },
            { type: 'email', message: 'Please enter a valid email address', trigger: 'blur' },
          ]
      },
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .forgot-password-form {
    &__form {
      
      &__inputs{
        .el-alert {
          margin-bottom:20px;
        }
        margin-top:30px;
        margin-bottom:30px;
      }
    }
  }
</style>
