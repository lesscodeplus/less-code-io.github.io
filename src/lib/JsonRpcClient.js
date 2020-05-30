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
            return {result: {error : "Service Unavailable"} };
        }


    }
}