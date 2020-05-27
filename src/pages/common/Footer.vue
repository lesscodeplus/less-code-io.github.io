<template>
  <div class="nav-footer">
      <p>Copyright (c) less-code.io 2020</p>
  </div>
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
      display: flex;
      justify-content: center;
      align-items: flex-end;
      
      p {
        opacity: 0.5;
      }
    }
</style>
