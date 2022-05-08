import { HomeOutlined } from "@ant-design/icons";
import { Layout } from "antd";
import { Content, Footer, Header } from "antd/lib/layout/layout";
import React from "react";
import { Helmet, HelmetProvider } from "react-helmet-async";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import ClientFooter from "../children/footer/ClientFooter";
import ClientNavbar from "../children/navbar/ClientNavbar";
import HomePage from "./client/HomePage";
import IntroductionPage from "./client/IntroductionPage";

export const clientRouterPath = {
  home: "/",
  introduction: "/introduction",
  service: "/service"
}

const ClientView = () => {

  const navItem = [
    {
      to: clientRouterPath.home,
      label:"Trang chu",
      icon: <HomeOutlined />
    },
    {
      to: clientRouterPath.introduction,
      label: "Giới thiệu"
    },
    {
      to: clientRouterPath.service,
      label: "Dịch vụ"
    }
  ];

  return (<>
      <HelmetProvider>
        <Layout>
          <Header style={{position: "fixed", zIndex: 1, width: "100%"}}>
              <div className="logo" />
              <ClientNavbar navItem={navItem} />
          </Header>
          <Content className="site-layout" style={{
            padding:'0 50px', marginTop: 84}}>
            <div className="site-layout-background" style={{
              background: "white",
              padding: 24,
              minHeight: 380,
              minWidth: 300
            }}
            >
              <Routes>
                <Route path={clientRouterPath.home} element={<HomePage />} />
                <Route path={clientRouterPath.introduction} element={<IntroductionPage />} />
              </Routes>
            </div>
          </Content>
          <Footer>
            <ClientFooter />
          </Footer>
        </Layout>
      </HelmetProvider>
  </>);
}

export default ClientView;