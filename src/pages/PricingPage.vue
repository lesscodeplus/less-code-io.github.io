<template>
  <div class="pricing-page">
    <div class="pricing-page__container">
      <el-row  class="pricing-page__container__header">
        <el-col :span="16"><label>Feature</label></el-col>
        <el-col :span="4"><label>Free</label></el-col>
        <el-col :span="4"><label>Enterprise</label></el-col>
      </el-row>
      <el-row v-for="item of items" :key="item.feature" class="pricing-page__container__row">
        <el-col :span="24" v-if="item.seperator"></el-col>
        <el-col :span="16" v-if="!item.seperator"><label>{{item.feature}}</label></el-col>
        <el-col :span="4" v-if="!item.seperator"><label>{{item.free}}</label></el-col>
        <el-col :span="4" v-if="!item.seperator"><label>{{item.enterprise}}</label></el-col>
      </el-row>
      <el-row class="pricing-page__container__row">
        <el-col :span="16"><label>&nbsp;</label></el-col>
        <el-col :span="4"><label>&nbsp;</label></el-col>
        <el-col :span="4"><div><el-button type="primary">Contact Us</el-button></div></el-col>
      </el-row>
    </div>
  </div>
</template>

<script>

export default {
  name: 'HomePage',
  components : {},
  props: {

  },
  data() {
    return {
      items: [
        {seperator:true},
        {feature: "Number of APIs",free: "Unlimited",enterprise:"Unlimited"},
        {feature: "Public Swagger URL",free: "YES",enterprise:"YES"},
        {feature: "Sandbox Hosting",free: "YES",enterprise:"YES"},
        {feature: "Web Hook Deployment",free: "YES",enterprise:"YES"},
        {feature: "Client Code Generation",free: "YES",enterprise:"YES"},
        {feature: "Databases",free: "MySQL/MSSQL",enterprise:"MySQL/MSSQL"},
        {feature: "Swagger Documentation Generator",free: "YES",enterprise:"YES"},
        {feature: "Python Scripting",free: "YES",enterprise:"YES"},
        {seperator:true},
        {feature: "Number of Environments",free: "1",enterprise:"Unlimited"},
        {feature: "Number of Blocks",free: "50",enterprise:"Unlimited"},
        {feature: "Number of Reusable Modules",free: "10",enterprise:"Unlimited"},
        {feature: "Sandbox Storage",free: "50 MB",enterprise:"Unlimited"},
        {seperator:true},
        {feature: "AWS Lambda Deployment",free: "Coming Soon",enterprise:"Coming Soon"},
        {feature: "Azure Cloud Functions Deployment",free: "Coming Soon",enterprise:"Coming Soon"},
        {feature: "Google Cloud Functions Deployment",free: "Coming Soon",enterprise:"Coming Soon"},
      ]
    }
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.pricing-page {
  display: flex;
  justify-content: center;
  margin-bottom:120px;
  
  &__container{
    margin-top:100px;
    width:100%;
    max-width:1000px;
    box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);

    &__header {
      background-color: rgb(97, 1, 129);
      padding-top:10px;
      padding-bottom:10px;

      label {
        margin-left:20px;
      }
    }

    &__row {
      padding-top:10px;
      padding-bottom:10px;
      background-color: #242424;
      label{
        margin-left:20px;
      }

      hr {
        
      }
      div{
        padding-right:5px;
        .el-button{
          margin-top:20px;
          width:100%;
          margin-bottom:20px;
        }
      }

    }
  }

}
</style>
