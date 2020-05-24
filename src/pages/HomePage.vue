<template>
  <div class="home-page">
    <div class="row">
      <div>
        <h1>Save up to 80% of your API development time and effort</h1>
        <p>
          Do tight deadlines, requirement changes, and heavy workloads keep you awake at nights?. Less-code has features to automate most of your API development efforts with less learning curve. All you have to do is to create a blueprint for your API.
        </p>
      </div>
      <div>
        <HomeAuth/>
      </div>
    </div>
    
  </div>
</template>

<script>
import HomeAuth from "./common/HomeAuth";

export default {
  name: 'HomePage',
  components : {
    HomeAuth
  },
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.home-page {
  h1 {
    font-weight: 100;
    font-size: 70px;
  }
}
</style>
