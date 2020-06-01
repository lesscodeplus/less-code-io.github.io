<template>
  <div class="account-page">
      <el-dialog top="80px" custom-class="account-page__cropper-dialog" :visible.sync="dialogVisible" :show-close="true">
          <vue-cropper v-if="cropper.tempPic" ref="cropper" :src="cropper.tempPic" 
            :aspectRatio = "1"
            :containerStyle="cropper.containerStyle" 
            :imgStyle="cropper.imgStyle" 
            alt="Source Image"> 
          </vue-cropper>
          <el-button type="primary" @click="cropImage">Crop</el-button>
      </el-dialog>
    <div class="account-page__container">
      <el-row>
        <el-col :span="24">
          <div class="account-page__container__profilepic">
            <input ref="fileInput" type="file" @input="pickFile">

            <div @click="selectImage" :style="{ 'background-image': `url(${profile.pic})` }">
              <el-button v-if="profile.pic" @click.stop="profile.pic = null" circle icon="el-icon-close"></el-button>
            </div>
            
          </div>
        </el-col>
      </el-row>

      <el-row>
        <el-col :span="24">
          <el-alert v-if="submission.error" :title="submission.error" type="error" effect="dark" :closable="false" show-icon></el-alert>
          <el-alert v-if="submission.success" title="Profile successfully saved" type="success" effect="dark" :closable="false" show-icon></el-alert>
        </el-col>
      </el-row>

      <el-form label-width="130px" label-position="left" :rules="rules" :model="profile" ref="profileForm">
        <el-row>
          <el-col :lg="12">
            <div class="account-page__container__form">
              <h1>Personal information</h1>
                <el-form-item label="Email" prop="email"  >
                  <el-input v-model="profile.email" disabled></el-input>
                </el-form-item>
                <el-form-item label="First Name" prop="firstName">
                <el-input v-model="profile.firstName"></el-input>
                </el-form-item>
                <el-form-item label="Last Name" prop="lastName">
                  <el-input v-model="profile.lastName"></el-input>
                </el-form-item>
                <el-form-item label="Date of Birth" prop="dateOfBirth">
                  <el-date-picker v-model="profile.dateOfBirth" type="date"></el-date-picker>
                </el-form-item>
            </div>
          </el-col>

          <el-col :lg="12">
            <div class="account-page__container__form">
              <h1>Contact information</h1>
                <el-form-item label="Phone Number" prop="phoneNumber">
                  <el-input v-model="profile.phoneNumber"></el-input>
                </el-form-item>
                <el-form-item label="Address" prop="address">
                  <el-input v-model="profile.address"></el-input>
                </el-form-item>
                <el-form-item label="City" prop="city">
                <el-input v-model="profile.city"></el-input>
                </el-form-item>
                <el-form-item label="State / Province" prop="state">
                <el-input v-model="profile.state"></el-input>
                </el-form-item>
                <el-form-item label="Zip" prop="zip">
                  <el-input v-model="profile.zip"></el-input>
                </el-form-item>
                <el-form-item label="Country" prop="country">
                  <el-select placeholder="" v-model="profile.country" :filterable="true">
                      <el-option v-for="country in countries" :key="country.alpha3Code" :value="country.alpha3Code" :label="country.name"></el-option>
                  </el-select>
                </el-form-item>
            </div>            
          </el-col>

        </el-row>

        <el-row>
          <el-col :span="24">
            <div class="account-page__container__submit">
              <el-button type="primary" class="auth-button" v-on:click="onSubmit()">Submit</el-button>
            </div>
          </el-col>
        </el-row>

      </el-form>
    </div>
  </div>
</template>

<script>
import VueCropper from 'vue-cropperjs';
import 'cropperjs/dist/cropper.css';
import {requiredProp,checkCookie,createCookie} from '../lib/Common';
import eLocale from "element-ui/lib/locale";
import langEn from "element-ui/lib/locale/lang/en";

export default {
  name: 'DocPage',
  components : { VueCropper },
  props: {},
  beforeMount(){
    const cookie = checkCookie();
    this.getAllCountries();
    if (cookie){
      this.profile = {...cookie.profile};
    }else {
      this.$router.push("/");
    }
    
  },
  mounted(){
      eLocale.use(langEn);
  },
  methods: {
      onSubmit(){
        this.$refs.profileForm.validate(async (valid) => {
          if (valid){
            const result = await this.$backendServices.saveProfile(this.profile);
            const error = result?.error || result?.result?.error;
            if (error){
              this.submission.error = error;
              this.submission.success = false;
            }else {
              this.submission.success = true;
              this.submission.error = null;
              createCookie(result,null);
            }

            this.$scrollToTop();
          }
        });
      },
      async getAllCountries(){
        const url = "https://restcountries.eu/rest/v2/all?fields=name;alpha2Code;alpha3Code";
        const response = await this.axios.get(url);
        this.countries = response?.data || [];
      },
      cropImage(){
        const cropper = this.$refs.cropper;
        this.profile.pic = cropper.getCroppedCanvas({
          width:200,
          height:200
        }).toDataURL();

        this.dialogVisible = false;
      },
      selectImage () {
        this.$refs.fileInput.click()
      },
      pickFile () {
        let input = this.$refs.fileInput
        let file = input.files
        
        if (file && file[0]) {
          let reader = new FileReader
          reader.onload = e => {
            this.cropper.tempPic = e.target.result
            
          }
          reader.readAsDataURL(file[0])
          this.$emit('input', file[0])
        }

        input.value = null;
      }
  },
  computed: {
    dialogVisible: { 
      get() {
        return this.cropper.tempPic ? true: false;
      },
      set(){
        this.cropper.tempPic = null;
      }
    }
  },
  data(){
      return {
        submission:{
          error: null,
          success: false
        },
        cropper: {
          tempPic: null,
          imgStyle: {
            width:"200px",
            height:"200px"
          },
          containerStyle: {
            width:"500px",
            height:"500px"
          },
        },
        profile : {
          email:null,
          pic:null
        },
        countries: [],
        rules: {
            email:[requiredProp("Email is required")],
            firstName:[requiredProp("First name is required")],
            lastName:[requiredProp("Last name is required")],
            dateOfBirth:[requiredProp("Date of birth is required")],
            phoneNumber:[requiredProp("Phone number is required")],
            address:[requiredProp("Address is required")],
            city:[requiredProp("City is required")],
            state:[requiredProp("State is required")],
            zip:[requiredProp("Zip is requried")],
            country:[requiredProp("Country is required")]
        }
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.account-page {
  width:100%;
  display: flex;
  justify-content: center;

  &__cropper-dialog{
    background-color: black !important;
    display: flex;
    justify-content: center;

    .el-button{
      margin-top:20px;
      width:120px;
    }
  }

  &__container {
    width:100%;
    max-width:1200px;

    &__submit {
      display: flex;
      justify-content: center;
    }
    &__profilepic {
      width:100%;
      display: flex;
      justify-content: center;
      
      input {
        display: none;
      }

      div {
        height:200px;
        width:200px;
        background-color: black;
        border-radius: 100px;
        cursor: pointer;

        display: flex;
        align-items: flex-end;
        justify-content: center;
        background-size: cover;
        background-position: center center;

        .el-button {
         opacity: 0.5; 
         background-color: black;
         border-color: black;
         color: white;
        }
      }
      margin-bottom:50px;
    }

    &__form {
      @media only screen and  (min-width: 1024px) {   
        padding-left:20px;
        padding-right:20px;
      }

      .el-date-editor {
        width:100%;
      }

      .el-select {
        width:100%;
      }

      max-width:460px;
      h1 {
        font-weight: 100;
        font-size: 30px;
      }
    }

  }

}
</style>
