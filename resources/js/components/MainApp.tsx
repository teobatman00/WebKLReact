import React from "react";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import AdminView from "./views/AdminView";
import ClientView from "./views/ClientView";
import "antd/dist/antd.css";
import { useMediaQuery } from "react-responsive";

export function Desktop ({children}: any) {
  const isDesktop = useMediaQuery({minWidth: 992});
  return isDesktop ? children : null;
}

export function Tablet ({children}: any) {
  const isTablet = useMediaQuery({ minWidth: 768, maxWidth: 991 })
  return isTablet ? children : null
}

export function Mobile ({children}: any) {
  const isMobile = useMediaQuery({ maxWidth: 767 })
  return isMobile ? children : null
}

export function TabletAndAbove({children}: any) {
  const isTabletAndAbove = useMediaQuery({minWidth: 768});
  return isTabletAndAbove ? children: null;
}


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