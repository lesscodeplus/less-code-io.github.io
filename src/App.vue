<template>
  <div class="app">
    <div class="app__menu" v-if="!hideHeaderFooter">
      <NavMenu/>
    </div>

    <div class="app__container">
      <div class="app__container__page">
        <router-view/>
      </div>
      <div class="app__container__footer" v-if="!hideHeaderFooter">
        <Footer/>
      </div>
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
  },
  data(){
    return {
      
    }
  },
  computed : {
    hideHeaderFooter(){
      const path = this.$route?.path;
      return path=="/confirm" || path=="/reset-password";
    }
  }
}
</script>

<style lang="scss">
  @import "./main.scss";

  .app {
    &__menu {
      display: aboslute;
      top:0px;
      box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.1);
    }
    
    &__container {
      overflow: auto;
      
      &__page {
        min-height:100vh;
        margin-top:20px;
        margin-bottom:20px;
        margin-left:40px;
        margin-right:40px;
      }
      
      &__footer {
        height:500px;
        background-color: black;
      }
    }

  }

</style>
