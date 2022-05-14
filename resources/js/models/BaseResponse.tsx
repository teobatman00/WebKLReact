import React from "react";

export default interface BaseResponse<T> {
    success: boolean,
    message: string,
    data: T
}