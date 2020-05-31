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
                <p>Password Strength</p> <el-progress :percentage="progress.percentage" :color="customColorMethod"></el-progress>
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

export default {
  name: 'SignUpForm',
  props: {},
  components: { VueRecaptcha },
  watch:{
    ["form.password"](val) {
      this.progress.percentage = this.getPasswordForProgress(val);
    }
  },
  methods : {
    async submitForm(){
        if (this.formValidated && this.recaptchaToken){
          const l = window.location;
          const port = l.port ? `:${l.port}`:"";
          const host = `${l.protocol}//${l.hostname}${port}`;
          const result = await this.$authService.signUp({host, recaptchaToken:this.recaptchaToken,...this.$data.form});
          if (result.error){
            this.signUpError = result.error;
          }else {
            localStorage.setItem("lc_auth",JSON.stringify(result));
            window.location.href = `/ide/`;
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
    scorePassword(pass) {
        let score = 0;
        if (!pass)
            return score;

        let letters = new Object();
        for (let i=0; i<pass.length; i++) {
            letters[pass[i]] = (letters[pass[i]] || 0) + 1;
            score += 5.0 / letters[pass[i]];
        }

        const variations = {
            digits: /\d/.test(pass),
            lower: /[a-z]/.test(pass),
            upper: /[A-Z]/.test(pass),
            nonWords: /\W/.test(pass),
        }

        let variationCount = 0;
        for (var check in variations) {
            variationCount += (variations[check] == true) ? 1 : 0;
        }
        score += (variationCount - 1) * 10;

        return parseInt(score);
    },
    checkPassStrength(pass) {
        var score = this.scorePassword(pass);
        if (score > 80)
            return "strong";
        if (score > 60)
            return "good";
        if (score >= 30)
            return "weak";

        return "";
    },
    customColorMethod(percentage) {
      if (percentage < 30) {
        return '#FF4949';
      } else if (percentage < 70) {
        return '#e6a23c';
      } else {
        return '#67c23a';
      }
    },
    getPasswordForProgress(pass){
      var score = this.scorePassword(pass);
      if (score > 70){
        return 100;
      }else {
        return Math.round(score / 70  * 100);
      }
      
    }
  },
  data(){

    const validatePass = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('Please enter a password'));
      } else {
        const strength = this.getPasswordForProgress(value);
        if (strength > 70){
          callback();
        }else {
          callback(new Error('Password should be at least 70% strong'));
        }
      }
    };

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
            { validator: validatePass, trigger: 'blur' }
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
