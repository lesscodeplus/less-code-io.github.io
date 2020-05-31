<template>
  <div class="confirm-account-page">
    
  </div>
</template>

<script>

export default {
  name: 'ConfirmAccountPage',
  props: {},
  data(){
    return {
    }
  },
  methods:{

  },
  async mounted(){
    const to = window.location.hash;
    const queryIndex = to.indexOf("?");
    if (queryIndex !== -1){
        const queryParams = to.substring(queryIndex + 1);
        const token = queryParams.replace("token=","");
        const result = await this.$authService.confirmAccount({token});
        if (!result.error){
          localStorage.setItem("lc_auth",JSON.stringify(result));
          window.location.href = "/ide/#/profile";
        }
    }
    window.location.href = "/";
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.confirm-account-page {

}
</style>
