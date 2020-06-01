<template>
  <div class="nav-menu-mobile">
    <div class="nav-menu-mobile__menu">
      <div>
        <el-button @click="drawer = true" icon="el-icon-s-unfold"></el-button>
      </div>
    </div>
    
    <div class="nav-menu-mobile__drawer">
      <el-drawer :wrapperClosable="true" :visible.sync="drawer" direction="ltr" custom-class="nav-menu-mobile__drawer__drawer" size="100%">
          <div slot="title" @click="drawer=false;$scrollToTop();"><router-link to="/"><img src="../../assets/logo.png"/></router-link></div>
          <ul>
            <li class="hovarable-inv" @click="drawer=false;$scrollToTop();"><router-link to="/">Home</router-link></li>
            <li class="hovarable-inv" @click="drawer=false;$scrollToTop();"><router-link to="features">Features</router-link></li>
            <li class="hovarable-inv" @click="drawer=false;$scrollToTop();"><router-link to="documentation">Documentation</router-link></li>
            <li class="hovarable-inv" @click="drawer=false;$scrollToTop();"><router-link to="pricing">Pricing</router-link></li>
            <li class="hovarable-inv" @click="drawer=false;$scrollToTop();"><router-link to="contact">Contact Us</router-link></li>
            <li v-if="authData" class="hovarable-inv"><a href="/ide/#/">IDE</a></li>
            <li v-if="authData"  @click="drawer=false;$scrollToTop();" class="hovarable-inv"><router-link to="account">Account</router-link></li>
          </ul>
      </el-drawer>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NavMenuMobile',
  props: {},
  data(){
    return {
      drawer : false,
      authData: this.$backendServices.authData
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" >
  .nav-menu-mobile {
    
    &__menu {
      z-index:1;
      position: fixed;
      background-color: rgb(36, 36, 36);
      width:100%;
      height:40px;
      display: flex;

      .el-button,.el-button:active, .el-button:hover, .el-button:focus{
        border-radius: 0px;
        border-color: black;
        color: white;
        background-color: black;
        font-size: 26px;
        padding: 5px;
      }
    }


    &__drawer{
      &__drawer{
        background-color: black !important;
      }

      ul {
        list-style-type: none;

        li {
          height:50px;
          width:100%;
          background-color: black;
          margin-right: 100px;
          cursor: pointer;
          vertical-align: middle;
          text-shadow: 2px 2px 4px #000000;
          a{
            color: white; 
            text-decoration: none;
          }
        }
      }
    }


  }
</style>
