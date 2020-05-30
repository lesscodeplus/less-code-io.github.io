import JsonRpcClient from './JsonRpcClient';

class AuthService {

    jsonRpcClient;

    constructor(){
        this.jsonRpcClient = new JsonRpcClient("UiServices");
    }

    async signIn({email,password}){
        const result = await this.jsonRpcClient.call(undefined,"AuthService", "signIn", [email,password]);
        return result.result;
    }

    async signUp({host, recaptchaToken,email,password}){
        const result = await this.jsonRpcClient.call(undefined,"AuthService", "signUp", [host, recaptchaToken,email,password]);
        return result.result;
    }

    async forgotPassword({host, recaptchaToken,email}){
        const result = await this.jsonRpcClient.call(undefined,"AuthService", "forgotPassword", [host, recaptchaToken,email]);
        return result.result;
    }    
    
    async submitContact({recaptchaToken,data}){
        const result = await this.jsonRpcClient.call(undefined,"AuthService", "submitContact", [recaptchaToken,data]);
        return result.result;
    }
}

const AuthServicePlugin  = {
    install(Vue) {
      Vue.prototype.$authService = new AuthService();
    }
};
  
export default AuthServicePlugin;