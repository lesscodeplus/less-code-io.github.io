<template>
  <div class="contact-page">
    <div class="contact-page__container">
      <el-row>
        <el-col :sm="12">         
          <div class="contact-page__container__form">
            <el-alert v-if="signUpError" :title="signUpError" type="error" effect="dark" :closable="false" show-icon></el-alert>
            <el-alert v-if="submitted" title="We have recieved your message, we will go through it and get back to you :) " type="success" effect="dark" :closable="false" show-icon></el-alert>            
            <el-form ref="contactForm" :model="contactForm" :rules="rules">
              
              <el-form-item prop="name">
                <el-input placeholder="Name" v-model="contactForm.name"></el-input>
              </el-form-item>
              <el-form-item prop="email">
                <el-input placeholder="Email" v-model="contactForm.email"></el-input>
              </el-form-item>
              <el-form-item prop="message">
                <el-input type="textarea" :rows="9" placeholder="Message" v-model="contactForm.message"></el-input>
              </el-form-item>
          <el-form-item>
            <vue-recaptcha sitekey="6Lfvp_0UAAAAACUAHEN-JgRj_Lqa054XkjG5Dto0" ref="recaptchaContact" @verify="onRecaptchaVerified" v-show="!recaptchaToken && formValidated" >
              <el-button type="primary" class="auth-button" v-on:click="onSubmit()">Submit</el-button>
            </vue-recaptcha>
            <el-button  v-show="!(!recaptchaToken && formValidated)" type="primary" class="auth-button" v-on:click="onSubmit()">Submit</el-button>
          </el-form-item>
            </el-form>
          </div>
        </el-col>
        <el-col :sm="12">
          <div class="contact-page__container__address">
            <div> 
              <h4>Connect with us</h4>
              <p>For support or any questions, </p>
              <p>Email us at supun@less-code.io</p>
            </div>
            <div>
              <h4>less-code.io</h4>
              <p>127/44B Dutugemunu Street,</p>
              <p>Colombo-06</p>
              <p>Phone: +94 719998797</p>
            </div>
          </div>

        </el-col>
      </el-row>
    </div>   
  </div>
</template>

<script>
import VueRecaptcha from 'vue-recaptcha';
import {requiredProp,emailProp} from '../lib/Common';

export default {
  name: 'ContactPage',
  components: { VueRecaptcha },
  props: {},
  data(){
    return {
      signUpError: undefined,
      formValidated:false,
      recaptchaToken:undefined,
      submitted:false,
      contactForm: {
        name:null,
        email:null,
        message:null
      },
      rules: {
          name: [requiredProp('Name is required')],
          email: [requiredProp('Email address is required'),emailProp()],
          message: [requiredProp('Messsage is required')]
      }
    }
  },
  methods:{
    async submitForm(){
        if (this.formValidated && this.recaptchaToken){
          const result = await this.$backendServices.submitContact({recaptchaToken:this.recaptchaToken,data: {...this.$data.contactForm}});
          if (result.error){
            this.signUpError = result.error;
          }else {
            this.submitted = true;
            this.resetForm();
            this.recaptchaToken = undefined;
            this.formValidated = false;
            this.$refs.recaptchaContact.reset();
            this.signUpError = undefined;
          } 
        }
     
    },
    onRecaptchaVerified(recaptchaToken){
        this.recaptchaToken = recaptchaToken;
        this.submitForm();
    },
    onSubmit(){
      this.$refs.contactForm.validate((valid) => {
        if (valid){
          this.formValidated = true;
          if (!this.recaptchaToken){
            this.$refs.recaptchaContact.execute();
          }
          this.submitForm();
        }else {
          this.formValidated = false;
        }
      });
    },
    resetForm() {
      this.$refs.contactForm.resetFields();
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.contact-page {
  display: flex;
  justify-content: center;
  &__container{
    margin-top:100px;
    width:100%;
    max-width:1200px;

    &__form {
      padding:20px;

      .el-alert {
        margin-bottom:20px;
      }
    }

    &__address{
      padding-left:20px;
      div {
        h4 {
          opacity: 0.5;
        }
        margin-bottom: 40px;
      }
    }
  }
}
</style>
