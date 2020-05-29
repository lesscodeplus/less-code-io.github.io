import Vue from 'vue'
import Environment from "./Environment"

export default class JsonRpcClient {

    namespace;

    constructor(namespace){
        this.namespace = namespace;
    }

    async call(token, pageName, method, params){
        const endpoint = `${Environment.rpcEndpoint}/${pageName}`;
        let config = {
            headers: {
                'Content-Type': 'application/json',
            }
        };

        if (token){
            config.headers['Authorization'] = token;
        }

        const request = {
            jsonrpc: "2.0", 
            namespace:this.namespace,
            method, 
            params, 
            id: 0
        };
        
        try {
            const response = await Vue.axios.post(endpoint,request,config);
            return response.data;
        }catch (e){
            if (!e.response){
                return {error : {code:"Errors.RPC_UNABLE_TO_CONNECT", message: `Strings.RPC_UNABLE_TO_CONNECT : ${endpoint}`}};
            }else {
                switch (e.response.status){
                    case 401:
                        return {error : {code:"Errors.AUTH_ERROR", message: "Strings.RPC_SERVER_ERROR"}};
                    case 500:
                        return {error : {code:"Errors.RPC_SERVER_ERROR", message: "Strings.RPC_SERVER_ERROR"}};
                    default:
                        return {error : {code:"Errors.RPC_UNKNOWN_ERROR", message: "Strings.RPC_UNKNOWN_ERROR"}};
                }
            }  
        }


    }
}