import React from "react";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import AdminView from "./views/AdminView";
import ClientView from "./views/ClientView";
import "antd/dist/antd.css";

const MainApp = () => {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="*" element={<ClientView />} />
          <Route path="/admin/*" element={<AdminView />} />
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default MainApp;