<template>
  <div class="app">
    <div class="app__menu">
      <NavMenu/>
    </div>
    <div class="app__page">
      <router-view/>
    </div>
    <div class="app__footer">
      <Footer/>
    </div>
  </div>
</template>

<script>

import NavMenu from './pages/common/NavMenu';
import Footer from './pages/common/Footer';

export default {
  name: 'App',
  components: {  
    NavMenu,
    Footer
  }
}
</script>

<style lang="scss">
  @import "./main.scss";

  .app {
    

    &__page {
      min-height:calc(100vh - 320px);
      margin-top:20px;
      margin-bottom:20px;
      margin-left:40px;
      margin-right:40px;
    }
    
    &__footer {
      height:200px;
      background-color: black;
    }
  }

</style>
