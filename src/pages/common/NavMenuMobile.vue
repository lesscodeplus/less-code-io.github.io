<template>
  <div class="nav-menu-mobile">
    <el-button @click="drawer = true" icon="el-icon-s-unfold"></el-button>
    <!-- <router-link to="/"><img src="../../assets/logo.png"/></router-link> -->
    <el-drawer :visible.sync="drawer" direction="ltr" custom-class="nav-menu-mobile__drawer" size="100%">
        <div slot="title" @click="drawer=false"><router-link to="/"><img src="../../assets/logo.png"/></router-link></div>
        <ul>
          <li class="hovarable-inv" @click="drawer=false"><router-link to="features">Features</router-link></li>
          <li class="hovarable-inv" @click="drawer=false"><router-link to="documentation">Documentation</router-link></li>
          <li class="hovarable-inv" @click="drawer=false"><router-link to="pricing">Pricing</router-link></li>
          <li class="hovarable-inv" @click="drawer=false"><router-link to="contact">Contact Us</router-link></li>
        </ul>
    </el-drawer>
  </div>
</template>

<script>
export default {
  name: 'NavMenuMobile',
  props: {},
  data(){
    return {
      drawer : false
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" >
  .nav-menu-mobile {

    background-color: rgb(36, 36, 36);
    height:40px;
    display: flex;
    img {
      margin-left:20px;
    }

    .el-button,.el-button:active, .el-button:hover, .el-button:focus{
      border-radius: 0px;
      border-color: black;
      color: white;
      background-color: black;
      font-size: 26px;
      padding: 5px;
    }

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
</style>
