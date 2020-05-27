<template>
  <div class="home-page">
    <div class="home-page__container">
      
      <el-row class="home-page__container__top-stuff">
        <el-col :lg="16">
          <!-- <h1>Save your development time and effort up to 80%</h1> -->
          <img class="home-page__container__laptop" src="../../public/img/home-laptop.png"/>
        </el-col>
        <el-col :lg="8">
          <HomeAuth/>
        </el-col>
      </el-row>   

      <el-row>
        <FeatureItem 
          title="Develop APIs without coding" 
          message="Develop REST APIs without coding with our IDE. Define your business logic with 'blocks'" 
          image="home-feature-1.png"/>

        <FeatureItem 
          title="Design Data Models" 
          message="Use our schema designer and develop your APIs to manipulate data in MySQL and SQL Server" 
          image="home-feature-2.png"/>

        <FeatureItem 
          title="Deploy Anywhere" 
          message="Use our schema designer and develop your APIs to manipulate data in MySQL and SQL Server" 
          image="home-feature-3.png"/>
      </el-row>

      <el-row>
        <FeatureItem 
          title="Generate API Documentation " 
          message="Use our schema designer and develop your APIs to manipulate data in MySQL and SQL Server" 
          image="home-feature-4.png"/>

        <FeatureItem 
          title="Integrate 3rd Party Systems" 
          message="Use our schema designer and develop your APIs to manipulate data in MySQL and SQL Server" 
          image="home-feature-5.png"/>

        <FeatureItem 
          title="Track production issues easily" 
          message="Use our schema designer and develop your APIs to manipulate data in MySQL and SQL Server" 
          image="home-feature-6.png"/>
      </el-row>

      <el-row>
        <el-col :span="24">
          <div class="home-page__container__message">
            <h1>It only takes less than a minute to sign up</h1>
            <el-button type="primary">Sign Up</el-button>
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
      <el-col :lg="8" class="home-feature">
        <div class="home-feature__container">
          <h3 class="home-feature__container__title">{{title}}</h3>
          <img class="home-feature__container__image" :src="getImage(image)"/>
          <p class="home-feature__container__message">{{message}}</p>
        </div>
      </el-col>
  `,
  props:{
    title: String,
    message: String,
    image: String
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
  props: {  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.home-feature {
  margin-bottom:20px;

  &__container {
    width:300px;
    height:430px;
    &__title{
      font-size:24px;
    }

    &__image{
      height:100px;
      margin-top:40px;
      margin-bottom:40px; 
    }

    &__message{

    }
  }

}

.home-page {
  display: flex;
  justify-content: center;
  &__container {
    width:100%;
    max-width:1200px;

    &__top-stuff {
      margin-top:80px;
      margin-bottom: 150px;
      img{
        height:450px;
      }
    }

    &__message {
      display: flex;
      align-items: center;

      .el-button {
        margin-left: auto;
          height:50px;
      }
    }
  }

}
</style>
