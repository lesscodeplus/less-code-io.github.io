<template>
  <div class="download-page">
      <div>
        <h1>Downloads!!! 😊</h1>
      </div>
  </div>
</template>

<script>

export default {
  name: 'DownloadPage',
  components : {},
  props: {}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.download-page {
  height:calc(100vh - 100px);
  width:100%;
  display: flex;
  justify-content: center;
  align-items: center;
  
  div {
    text-align: center;;
    h1 {
      opacity: 0.7;
      font-weight: 100;
      font-size: 35px;
    }
  }

}
</style>
