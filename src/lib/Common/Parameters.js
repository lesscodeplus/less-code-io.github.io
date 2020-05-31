export function getTokenFromQueryParams(){
    const to = window.location.hash;
    const queryIndex = to.indexOf("?");
    if (queryIndex !== -1){
        const queryParams = to.substring(queryIndex + 1);
        const token = queryParams.replace("token=","");
        return token;
    }
}