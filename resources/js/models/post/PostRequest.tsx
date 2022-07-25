import React from "react";

interface BasePost {
    title: string,
    excerpt: string,
    content: string,
    slug: string,
    imageUrl: string,
    published: boolean
}

interface PostCreateRequest extends BasePost {

}

interface PostUpdateRequest extends BasePost{

}

interface PostDetailResponse extends BasePost{

}

interface PostGetListResponse {
    id: string,
    title: string,
    excerpt: string,
    slug: string, 
    published: boolean
}

export {
    PostCreateRequest,
    PostUpdateRequest,
    PostDetailResponse,
    PostGetListResponse
}


