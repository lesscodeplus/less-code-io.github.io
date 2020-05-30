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

    async signUp({email,password}){
        const result = await this.jsonRpcClient.call(undefined,"AuthService", "signUp", [email,password]);
        return result.result;
    }

    async forgotPassword({email}){
        const result = await this.jsonRpcClient.call(undefined,"AuthService", "forgotPassword", [email]);
        return result.result;
    }    
}

const AuthServicePlugin  = {
    install(Vue) {
      Vue.prototype.$authService = new AuthService();
    }
};
  
export default AuthServicePlugin;