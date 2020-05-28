<template>
  <div class="home-page">
    <div class="home-page__container">
      
      <el-row class="home-page__container__top-stuff">
        <el-col :lg="16">
          <img class="home-page__container__top-stuff__laptop" src="../../public/img/home-laptop.png"/>
        </el-col>
        <el-col :lg="8">
          <HomeAuth/>
        </el-col>
      </el-row>   

      <el-row>
        <FeatureItem 
          title="Make APIs Without Code" 
          message="Develop REST APIs without coding with our IDE. Define your business logic with 'blocks'" 
          image="home-feature-1.png"/>

        <FeatureItem 
          title="Connect to Databases" 
          message="Use our schema designer and develop your APIs to manipulate data in MySQL and SQL Server" 
          image="home-feature-2.png"/>

        <FeatureItem 
          title="Deploy Anywhere" 
          message="Use our schema designer and develop your APIs to manipulate data in MySQL and SQL Server" 
          image="home-feature-3.png"/>
      </el-row>

      <el-row>
        <FeatureItem 
          title="Monitor in Production" 
          message="Use our schema designer and develop your APIs to manipulate data in MySQL and SQL Server" 
          image="home-feature-6.png"/>

        <FeatureItem 
          title="Integrate with Other Systems" 
          message="Use our schema designer and develop your APIs to manipulate data in MySQL and SQL Server" 
          image="home-feature-5.png"/>

        <FeatureItem 
          title="Automatic Documentation " 
          message="Use our schema designer and develop your APIs to manipulate data in MySQL and SQL Server" 
          image="home-feature-4.png"/>


      </el-row>

      <el-row>
        <el-col :span="24">
          <div class="home-page__container__signup-action hovarable">
            <h1>It only takes less than a minute to sign up</h1>
            <el-button type="primary" @click="scrollToTop()">Sign Up</el-button>
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
      <el-col :lg="8" class="home-feature" >
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
    &__top-stuff {
      margin-top:80px;
      margin-bottom: 150px;
      
      &__laptop {
        height:490px;
        opacity:0.8;
      }
    }

    &__signup-action {
      display: flex;
      align-items: center;
      margin-bottom:120px;
      padding-left:50px;
      padding-right:50px;

      h1 {
        font-weight: 100;
        font-size: 35px;
        cursor: default;
      }
      .el-button {
        margin-left: auto;
          height:50px;
      }
    }
  }

}
</style>
