<template>
  <div class="pricing-page">
    <div class="pricing-page__container">
      <el-row  class="pricing-page__container__header">
        <el-col :span="16"><label>Feature</label></el-col>
        <el-col :span="4"><label>Free</label></el-col>
        <el-col :span="4"><label>Enterprise</label></el-col>
      </el-row>
      <el-row v-for="item of items" :key="item.feature" class="pricing-page__container__row">
        <el-col :span="16"><label>{{item.feature}}</label></el-col>
        <el-col :span="4"><label>{{item.free}}</label></el-col>
        <el-col :span="4"><label>{{item.enterprise}}</label></el-col>
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
        {feature: "Number of APIs",free: "5",enterprise:"Unlimited"},
        {feature: "Number of Blocks",free: "20",enterprise:"Unlimited"},
        {feature: "Sandbox Storage",free: "50 MB",enterprise:"Unlimited"}
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

  &__container{
    margin-top:100px;
    width:100%;
    max-width:1200px;
    
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
    }
  }

}
</style>
