import React from "react";

const send = async <T,> (path:string, config: RequestInit) : Promise<T> => {
    
    const request = fetch(process.env.MIX_APP_URL + path, config);
    return request.then(res => res.json());
}

export const Request = {
    send
};

export enum Method {
    GET = "GET",
    POST = "POST",
    PUT = "PUT",
    DELETE = "DELETE"
}