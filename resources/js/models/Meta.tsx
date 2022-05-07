import React from "react";


interface MetaName {
    keywords?: string
}

interface ChildMeta {
    charset?: string
    name?: MetaName
}

export default interface Meta {
    title?:string,
    description?: string,
    canonical?: string
    meta?: ChildMeta
}