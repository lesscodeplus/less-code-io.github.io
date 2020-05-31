<template>
  <div class="reset-password-page">
    <div class="reset-password-page__container">
      <p>Please enter your new password</p>
      <el-alert v-if="signUpError" :title="signUpError" type="error" effect="dark" :closable="false" show-icon></el-alert>
      <el-form ref="form_reset" :model="form" :rules="rules">
        <el-form-item prop="password">
          <el-input placeholder="Password" v-model="form.password" type="password"></el-input>
          <transition name="fade">
            <div v-if="form.password">
              <p>Password Strength</p> <el-progress :percentage="progress.percentage" :color="getColorForStrength"></el-progress>
            </div>
          </transition>
        </el-form-item>
        <el-form-item>
          <el-button type="primary"  v-on:click="onSubmit()">Reset Password</el-button>
        </el-form-item>
      </el-form>
    </div>
  </div>
</template>

<script>

import {
  getTokenFromQueryParams,
  getColorForStrength,
  showPasswordStrength,
  passwordValidator
} from '../lib/Common';

export default {
  name: 'ResetPasswordPage',
  props: {},
  data(){
    return {
      signUpError: undefined,
      form: {
        password: ""
      },
      rules: {
          password: [
            { validator: passwordValidator, trigger: 'blur' }
          ]
      },
      progress: {
        percentage: 0
      }
    }
  },
  watch:{
    ["form.password"](val) {
      this.progress.percentage = showPasswordStrength(val);
    }
  },
  methods:{
    getColorForStrength,
    async submitForm(){
      const token = getTokenFromQueryParams();
      const result = await this.$backendServices.resetPassword({token,...this.$data.form});
      if (result.error){
        this.signUpError = result.error;
      }else {
        window.location.href="/#/?login";
      } 
    },
    onSubmit(){
      this.$refs.form_reset.validate((valid) => {
        if (valid){
          this.submitForm();
        }
      });
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.reset-password-page {
  width:100%;
  height:100vh;

  display: flex;
  align-items: center;
  justify-content: center;

  &__container {
    width:400px;
    height:300px;
    
    .el-alert {
      margin-bottom:20px;
    }
    
    .el-button {
      margin-top:30px;
    }
  }
}
</style>
