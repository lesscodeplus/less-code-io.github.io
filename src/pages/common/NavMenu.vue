<template>
  <div class="nav-menu">
    <div>
      <div class="grid-content">
        <ul>
          <li class="hovarable-inv"><router-link to="/"><img src="../../assets/logo.png"/></router-link></li>
          <li class="hovarable-inv"><router-link to="features">Features</router-link></li>
          <li class="hovarable-inv"><router-link to="documentation">Documentation</router-link></li>
          <li class="hovarable-inv"><router-link to="pricing">Pricing</router-link></li>
          <li class="hovarable-inv"><router-link to="contact">Contact Us</router-link></li>
        </ul>
        
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NavMenu',
  props: {}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .nav-menu {
    background-color: rgb(36, 36, 36);
    padding-left: 20px;
    padding-right: 20px;
    height:80px;
    display: flex;
    align-content: center;

    div {

      height:40px;

      ul {
        list-style-type: none;

        li {
          display: inline;
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
