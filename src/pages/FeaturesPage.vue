<template>
  <div class="features-page">
    <div class="features-page__container">
      <FeatureItem 
        image="feature-01.png"
        title="Use 'Blocks' to Define your Business Logic"
        message="With less-code you don't need to know how to code, You can define your endpoint logic easily using our block editor. You can even use this feature to write complex business logic."
      />
      
      <FeatureItem 
        image="feature-02.png"
        title="Design your Data Models"
        message="You can design and deploy your database schemas and tables using our drag and drop designer which supports MySQL and SQL Server."
      />

      <FeatureItem 
        image="feature-03.png"
        title="Organize your Blocks for Large Scale Backends"
        message="Your backend may have many features, business rules, and you may need to reuse some of the existing blocks in many places. With less-code IDE you can encapsulate your blocks in Reusable Modules, and organize those in various namespaces."
      />

      <FeatureItem 
        image="feature-04.png"
        title="Use Python Scripts to Handle Edge Cases"
        message="If you are required to implement a sophisticated algorythm or handle various special scenarios, you are not limited to our blocks. You can use Python scripting to handle those edge cases."
      />

      <FeatureItem 
        image="feature-05.png"
        title="Easily Track Runtime Execution and Errors"
        message="In our IDE When you execute an endpoint you can visualize the sequence of blocks which have been executed from start to end, and visualize various logs to identify internal workings and to trace down errors."
      />

      <FeatureItem 
        image="feature-06.png"
        title="Manage and Deploy in Multiple Environments"
        message="Streamline with your existing development workflow by having multiple environments which you can deploy your APIs."
      />

      <FeatureItem 
        image="feature-07.png"
        title="Automatically Generate API Documentation"
        message="Less-code IDE can automatically generate your API documentation in Open API v3 format without using any 3rd party tool."
      />
    </div>
  </div>
</template>

<script>

const FeatureItem = {
  template: `
      <el-row class="feature-item hovarable">
        <el-col :md="12">
          <img class="feature-item__image" :src="getImage(image)"/>
        </el-col>
        <el-col :md="12">
          <h3 class="feature-item__title">{{title}}</h3>
          <p class="feature-item__message">{{message}}</p>
        </el-col>
      <el-row>
  `,
  props:{
    image: String,
    title:String,
    message: String
  },
  methods : {
    getImage(image) {
        var images = require.context('../../public/img/');
        return images(`./${image}`);
    }
  }
};


export default {
  name: 'FeaturesPage',
  components : {
    FeatureItem
  },
  props: {}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" >

.feature-item {
  margin-bottom:60px;

  &__image {
    height:300px;
    margin-bottom:30px;
    border-radius: 10px;
    border: solid;
    border-color: rgb(128, 128, 128);
  }

  &__message {
    font-size:20px;
  }

  &__title {
    font-size:30px;
    margin:0px;
    margin-bottom: 30px;
  }
}

.features-page {
  display: flex;
  justify-content: center;
  margin-top:100px;

  &__container {
    max-width:1200px;
    width: 100%;
  }

}
</style>
