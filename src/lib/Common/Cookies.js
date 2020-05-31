const cookieName = "lc_auth";

export function getHostAndPort(){
    const l = window.location;
    const port = l.port ? `:${l.port}`:"";
    const host = `${l.protocol}//${l.hostname}${port}`;
    return host;
}

export function createCookie(result, navigateUrl="/ide/"){
    localStorage.setItem(cookieName,JSON.stringify({result}));
    if (navigateUrl){
        window.location.href = navigateUrl;
    }
}

export function checkCookie(){
    const localStorageItem = localStorage.getItem(cookieName);
    if (localStorageItem){
        return JSON.parse(localStorageItem).result;
    }
}

export function deleteCookie(){
    localStorage.removeItem(cookieName);
    window.location.reload();
}