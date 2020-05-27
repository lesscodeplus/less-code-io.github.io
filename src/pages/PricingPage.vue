<template>
  <div class="pricing-page">
    <el-row>
      <el-col :md="16">Feature</el-col>
      <el-col :md="4">Free</el-col>
      <el-col :md="4">Enterprise</el-col>
    </el-row>
    <el-row v-for="item of items" :key="item.feature">
      <el-col :md="16">{{item.feature}}</el-col>
      <el-col :md="4">{{item.free}}</el-col>
      <el-col :md="4">{{item.enterprise}}</el-col>
    </el-row>
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
        {
          feature: "Number of Blocks",
          free: "20",
          enterprise:"Unlimited"
        }
      ]
    }
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.pricing-page {


}
</style>
