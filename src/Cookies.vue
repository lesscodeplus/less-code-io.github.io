<template>
  <footer class="cookies">
      <div class="cookies__container">
        <el-row>
          <el-col :span="18">
            <p>We use Cookies to enhance your user experience</p>
            <p>for a complete overview of all cookes used, Please see our privacy policy</p>
          </el-col>
        
          <el-col :span="6" class="cookies__container__buttons">
            <el-button type="primary">Accept</el-button>
            <el-button>Reject</el-button>
          </el-col>

        </el-row>

      </div>
  </footer>
</template>

<script>
export default {
  name: 'Cookies',
  props: {}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  @keyframes slideInFromLeft {
    0% {
      transform: translateY(100%);
    }
    100% {
      transform: translateY(0);
    }
  }

  .cookies {
      animation: 0.3s ease-out 0s 1 slideInFromLeft;

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
            width:100px;
          }
        }
      }
    }
</style>
