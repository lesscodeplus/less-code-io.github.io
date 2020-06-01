<template>
  <div class="account-page">
    <el-form label-width="120px" label-position="left" :rules="rules" ref="profile">
      
      <div class="account-page__personal-form">
        <h1>Personal information</h1>
          <el-form-item label="Email" prop="personal.email">
            <el-input v-model="profile.personal.email"></el-input>
          </el-form-item>
          <el-form-item label="First Name" prop="personal.firstName">
          <el-input v-model="profile.personal.firstName"></el-input>
          </el-form-item>
          <el-form-item label="Last Name" prop="personal.lastName">
            <el-input v-model="profile.personal.lastName"></el-input>
          </el-form-item>
          <el-form-item label="Date of Birth" prop="personal.dateOfBirth">
            <el-date-picker v-model="profile.personal.dateOfBirth" type="date"></el-date-picker>
          </el-form-item>
      </div>


      <div class="account-page__contact-form">
        <h1>Contact information</h1>
          <el-form-item label="Phone Number" prop="contact.phoneNumber">
            <el-input v-model="profile.contact.phoneNumber"></el-input>
          </el-form-item>
          <el-form-item label="Address" prop="contact.address">
            <el-input v-model="profile.contact.address"></el-input>
          </el-form-item>
          <el-form-item label="City" prop="contact.city">
          <el-input v-model="profile.contact.city"></el-input>
          </el-form-item>
          <el-form-item label="Zip" prop="contact.zip">
            <el-input v-model="profile.contact.zip"></el-input>
          </el-form-item>
          <el-form-item label="Country" prop="contact.country">
            <el-input v-model="profile.contact.country"></el-input>
          </el-form-item>
      </div>

    </el-form>
  </div>
</template>

<script>

import {requiredProp} from '../lib/Common';

export default {
  name: 'DocPage',
  components : {},
  props: {},
  data(){
      return {
        profile : {
          auth: {},
          personal: {},
          contact: {}
        },
        rules: {
          personal: {
            email:[requiredProp("Email is required")],
            firstName:[requiredProp("First name is required")],
            lastName:[requiredProp("Last name is required")],
            dateOfBirth:[requiredProp("Date of birth is required")]
          },
          contact: {
            phoneNumber:[requiredProp("Phone number is required")],
            address:[requiredProp("Address is required")],
            city:[requiredProp("City is required")],
            zip:[requiredProp("Zip is requried")],
            country:[requiredProp("Country is required")]
          }
        }
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.account-page {
  h1 {
    font-weight: 100;
    font-size: 50px;
  }
}
</style>
