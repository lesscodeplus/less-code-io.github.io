<template>
  <div class="confirm-account-page">
    
  </div>
</template>

<script>
import {createCookie,getTokenFromQueryParams} from '../lib/Common';

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
    const token = getTokenFromQueryParams();
    if (token){
        const result = await this.$backendServices.confirmAccount({token});
        if (!result.error){
          createCookie(result,"/ide/#/profile");
          return;
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
