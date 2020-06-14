<template>
  <div class="home-page">
    <div class="home-page__container">
      
      <el-row class="home-page__container__top-stuff">
        <el-col :lg="16">
          <div class="home-page__container__top-stuff__laptop">
            <img  src="../../public/img/home-laptop.png"/>
          </div>
        </el-col>
        <el-col :lg="8">
          <HomeAuth/>
        </el-col>
      </el-row>   

      <el-row>
        <FeatureItem 
          title="Low-code and No-code API development" 
          message="Define your business logic with 'blocks'. Still you are not limited by our features, You can always code your logic with Python." 
          image="home-feature-1.png"/>

        <FeatureItem 
          title="Connect to Databases" 
          message="Use our schema designer and develop your APIs to manipulate data in MySQL and SQL Server." 
          image="home-feature-2.png"/>

        <FeatureItem 
          title="Deploy Anywhere" 
          message="After you develop your APIs in our designer, you can compile the API as a 'Less-Code blueprint' which can be deployed anywhere with the Less-Code Engine."
          image="home-feature-3.png"/>

        <FeatureItem 
          title="Monitor in Production" 
          message="Easily monitor your API in production with tools such as Kibana, or Grafana. And you can get alerts to Slack." 
          image="home-feature-6.png"/>

        <FeatureItem 
          title="Integrate with Other Systems" 
          message="Less-code doesn't run in isolation, it always comes with the capability to integrate with systems using REST or AMQP." 
          image="home-feature-5.png"/>

        <FeatureItem 
          title="Auto Swaggerdoc Generation " 
          message="You don't have to seperately write code or use any other 3rd party tool to generate swagger doc for your APIs. Less-code generates your API documantation automatically." 
          image="home-feature-4.png"/>
      </el-row>


      <el-row>
        <el-col :span="24">
          <div class="home-page__container__signup-action hovarable">
            <h1>It only takes less than a minute to <a @click="scrollToTop()">sign up</a></h1>
          </div>
        </el-col>
      </el-row>
    </div>
  </div>
</template>

<script>
import HomeAuth from "./common/HomeAuth";

const FeatureItem = {
  template: `
      <el-col :sm="12" :lg="8" class="home-feature" >
        <div class="home-feature__container hovarable">
          <h3 class="home-feature__container__title">{{title}}</h3>
          <img class="home-feature__container__image" :src="getImage(image)"/>
          <p class="home-feature__container__message">{{message}}</p>
        </div>
      </el-col>
  `,
  props:{
    title: String,
    message: String,
    image: String,
    align: String
  },
  methods : {
    getImage(image) {
        var images = require.context('../../public/img/');
        return images(`./${image}`);
    }
  }
};

export default {
  name: 'HomePage',
  components : {
    HomeAuth,
    FeatureItem
  },
  props: {  },
  methods: {
    scrollToTop(){
      window.scrollTo(0,0);
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.home-feature {
  display: flex;
  justify-content: center;
  text-align: center;
  margin-bottom:60px;
  

  &__container {
    width:300px;
    height:430px;
    cursor: default;

    &__title{
      font-size:24px;
      text-shadow: 2px 2px 6px #000000;
      height:60px;
      margin:0px;
    }

    &__image{
      height:100px;
      margin-top:40px;
      margin-bottom:40px; 
    }

    &__message{
      font-size:18px;
      text-align: justify;
      line-height: 1.5;
    }
  }

}

.home-page {
  display: flex;
  justify-content: center;
  
  &__container {
    width:100%;
    max-width:1200px;
    cursor: default;
    
    @media only screen and (min-width: 1024px) {
      
      &__top-stuff {
        margin-top:80px;
        &__laptop {
          display: flex;
          justify-content: center;
          img {
            height:480px;
            opacity:0.8;
            margin-bottom: 150px;
          }

        }
      }

    }

    @media only screen and (max-width: 823px)  {
      &__top-stuff {
        margin-top:40px;
        margin-bottom: 150px;
       
        &__laptop {
          img {
            width:100%;
            opacity:0.8;
            margin-bottom:50px;
          }

        }
      }
    }


    &__signup-action {
      display: flex;
      align-items: center;
      margin-bottom:120px;
      height:100%;
      width: 100%;

      h1 {
        font-weight: 100;
        font-size: 35px;
        cursor: default;

        a {
          cursor: pointer;
          color: #3498DB;
          text-decoration: underline;
        }
      }


    }
  }

}
</style>
