import React from "react";
import {Route, Routes} from "react-router-dom";
import Login from "../auth/Login";

const adminRoute = {

}

const AdminRoute = () => {

    return (
        <>
            <Routes>
                <Route path="/login" element={<Login />} />
            </Routes>
        </>
    );
}
