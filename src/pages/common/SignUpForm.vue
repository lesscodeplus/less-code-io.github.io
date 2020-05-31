<template>
  <div class="sign-up-form">
    <h1 class="auth-title">Save Time and Effort by Making APIs Without Code</h1>
    <p>It only takes less than a minute to sign up and try out less-code BETA!!!</p>
    <div class="sign-up-form__form">
      <div class="sign-up-form__form__inputs">
        <el-alert v-if="signUpError" :title="signUpError" type="error" effect="dark" :closable="false" show-icon></el-alert>
        <el-form ref="form_signup" :model="form" :rules="rules">
          <el-form-item prop="email">
            <el-input placeholder="Email" v-model="form.email"></el-input>
          </el-form-item>
          <el-form-item prop="password">
            <el-input placeholder="Password" v-model="form.password" type="password"></el-input>
            <transition name="fade">
              <div v-if="form.password">
                <p>Password Strength</p> <el-progress :percentage="progress.percentage" :color="getColorForStrength"></el-progress>
              </div>
            </transition>
          </el-form-item>
          <el-form-item>
            <p> By creating an account, you are agreeing to our <router-link class="auth-link" to="terms">Terms of Service</router-link> and <router-link class="auth-link" to="privacy">Privacy Policy.</router-link> </p>    
          </el-form-item>
          <el-form-item>
            <vue-recaptcha sitekey="6Lfvp_0UAAAAACUAHEN-JgRj_Lqa054XkjG5Dto0" ref="recaptcha" @verify="onRecaptchaVerified" v-show="!recaptchaToken" >
              <el-button type="primary" class="auth-button" v-on:click="onSubmit()">Sign Up</el-button>
            </vue-recaptcha>
            <el-button  v-show="recaptchaToken" type="primary" class="auth-button" v-on:click="onSubmit()">Sign Up</el-button>
          </el-form-item>
        </el-form>
      </div>
     
      <p>Already have an account? <router-link class="auth-link"  to="?login">Login instead</router-link></p>
      
    </div>
  </div>
</template>

<script>
import VueRecaptcha from 'vue-recaptcha';
import {
  getHostAndPort,createCookie,
  passwordValidator,getColorForStrength,showPasswordStrength
} from '../../lib/Common';

export default {
  name: 'SignUpForm',
  props: {},
  components: { VueRecaptcha },
  watch:{
    ["form.password"](val) {
      this.progress.percentage = showPasswordStrength(val);
    }
  },
  methods : {
    getColorForStrength,
    async submitForm(){
        if (this.formValidated && this.recaptchaToken){
          const host = getHostAndPort();
          const result = await this.$authService.signUp({host, recaptchaToken:this.recaptchaToken,...this.$data.form});
          if (result.error){
            this.signUpError = result.error;
          }else {
            createCookie(result);
          } 
        }
     
    },
    onRecaptchaVerified(recaptchaToken){
        this.recaptchaToken = recaptchaToken;
        this.submitForm();
    },
    onSubmit(){
      this.$refs.form_signup.validate((valid) => {
        if (valid){
          this.formValidated = true;
          this.$refs.recaptcha.execute();
          this.submitForm();
        }
      });
    },
    resetForm() {
      this.$refs.form_signup.resetFields();
    },
  },
  data(){

    return {
      form: {
        email: "",
        password: ""
      },
      signUpError: undefined,
      formValidated:false,
      recaptchaToken:undefined,
      rules: {
          email: [
            { required: true, message: 'Email address is required', trigger: 'blur' },
            { type: 'email', message: 'Please enter a valid email address', trigger: 'blur' },
          ],
          password: [
            { validator: passwordValidator, trigger: 'blur' }
          ]
      },
      progress: {
        percentage: 0
      }
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to{
  opacity: 0;
}

.sign-up-form {

  &__form {
    &__inputs {
      margin-top: 30px;
      margin-bottom: 30px;
      
      .el-alert {
        margin-bottom:20px;
      }
      p {
        font-size:12px;
        line-height: 1.5;
        margin:0px;
      }
    }
  }
}
</style>
