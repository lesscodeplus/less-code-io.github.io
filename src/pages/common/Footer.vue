<template>
  <footer class="nav-footer">
      <div class="nav-footer__container">
        
        <el-row>
          <el-col :span="24" class="nav-footer__container__git">
            <h4>GET IN TOUCH</h4>
          </el-col>
        </el-row>

        <el-row>
          <el-col :span="24" class="nav-footer__container__contact">
            <p>+94 719998797</p>
            <p>supun@less-code.io</p>
          </el-col>
        </el-row>

        <el-row>
          <el-col :md="6" class="nav-footer__container__sm-item">
            <h4>Features</h4>
            <p>IDE Features</p>
            <p>Compare pricing plans</p>
          </el-col>
          <el-col :md="6" class="nav-footer__container__sm-item">
            <h4>Documentation</h4>
            <p>Tutorials</p>
            <p>Documentation</p>
          </el-col>

          <el-col :md="6" class="nav-footer__container__sm-item">
            <h4>Company</h4>
            <p>Contact Us</p>
          </el-col>

          <el-col :md="6" class="nav-footer__container__sm-item">
            <h4>Legal</h4>
            <p>Privacy Policy</p>
            <p>Terms of Service</p>
          </el-col>

        </el-row>

        <el-row>
          <el-col :span="24" class="nav-footer__container__social">
            <a href=""><img class="hovarable" src="../../../public/img/social/hollow-cut-facebook.svg"/></a>
            <a href=""><img class="hovarable" src="../../../public/img/social/hollow-cut-linkedin.svg"/></a>
            <a href=""><img class="hovarable" src="../../../public/img/social/hollow-cut-youtube.svg"/></a>
            <a href=""><img class="hovarable" src="../../../public/img/social/hollow-cut-github.svg"/></a>
            <a href=""><img class="hovarable" src="../../../public/img/social/hollow-cut-twitter.svg"/></a>
          </el-col>
        </el-row>

        <el-row>
          <el-col :span="24" class="nav-footer__container__copyright">
            <p>Copyright (c) less-code.io 2020</p>
          </el-col>
        </el-row>

      </div>
      
  </footer>
</template>

<script>
export default {
  name: 'Footer',
  props: {}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
    .nav-footer {
      height:100%;
      width:100%;

      display: flex;
      justify-content: center;
      
      h4 {
        opacity: 0.5;
      }
      &__container{
        
        width:100%;
        max-width:1200px;

        &__git{
          display: flex;
          justify-content: center;          
        }

        &__contact{
          display: flex;
          justify-content: center;
          margin-bottom:50px;
          p {
            padding-left:30px;
            padding-right:30px;
          }
        }

        &__sm-item{
          font-size:14px;
        }

        &__social{
          margin-top:50px;
          margin-bottom:50px;
          display: flex;
          justify-content: center;
          
          img:hover {
            opacity: 1;
          }

          img {
            height:40px;
            margin:10px;
            opacity: 0.5;
            transition: opacity 0.5s;
          }
        }

        &__copyright {
          display: flex;
          justify-content: center;
          font-size:12px;
        }

      }

    }
</style>
