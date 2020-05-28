<template>
  <transition name="fade">
    <footer class="cookies" v-if="visible">
        <div class="cookies__container">
          <el-row>
            <el-col :span="18">
              <p>We use Cookies to enhance your user experience</p>
              <p>for a complete overview of all cookes used, Please see our privacy policy</p>
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
      background-color: #000000;
      
      position:fixed;
      bottom: 0px;
      z-index: 1000;
      display: flex;
      justify-content: center;
      
      align-items: center;
      
      &__container {
        width:100%;
        max-width: 1200px;
        
        &__buttons{
          display: flex;
          align-items: center;
          justify-content: flex-end;
          button{
            margin-top:25px;
            width:120px;
          }
        }
      }
    }
</style>
