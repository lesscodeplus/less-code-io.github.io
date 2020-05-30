<template>
  <transition name="fade">
    <footer class="cookies" v-if="visible">
        <div class="cookies__container">
          <el-row>
            <el-col :span="18">
              <p>We use Cookies to enhance your user experience</p>
              <p>for a complete overview of all cookes used, Please see our <router-link class="auth-link" to="privacy">privacy policy</router-link></p>
            </el-col>
          
            <el-col :span="6" class="cookies__container__buttons">
              <el-button @click="createCookie" type="primary">Accept</el-button>
              <el-button @click="visible=false">Reject</el-button>
            </el-col>

          </el-row>

        </div>
    </footer>
  </transition>
</template>

<script>
export default {
  name: 'Cookies',
  beforeMount(){
    const cookieItem = localStorage.getItem("cookieCreated");
    if (!cookieItem){
      this.visible = true;
    }
  },
  data() {
    return {
      visible:false
    }
  },
  methods:{
    createCookie(){
      localStorage.setItem("cookieCreated","true");
      this.visible = false;
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
  }
  .fade-enter, .fade-leave-to {
    opacity: 0;
  }

  .cookies {

      height:100px;
      width:100%;
      background-color: rgba(0,0,0,0.8);
      font-size:13px;
      position:fixed;
      bottom: 0px;
      z-index: 1000;
      display: flex;
      justify-content: center;
      
      align-items: center;
      p {
        margin:5px;
      }

      &__container {
        width:100%;
        max-width: 1200px;
        
        &__buttons{
          display: flex;
          align-items: center;
          justify-content: flex-end;
          button{
            width:120px;
          }
        }
      }
    }
</style>
