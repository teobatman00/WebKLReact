import { Layout } from "antd";
import { Content, Footer, Header } from "antd/lib/layout/layout";
import React from "react";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import ClientFooter from "../children/footer/ClientFooter";
import ClientNavbar from "../children/navbar/ClientNavbar";
import HomePage from "./client/HomePage";
import IntroductionPage from "./client/IntroductionPage";

const ClientView = () => {
  return (<>
    <Layout>
      <Header style={{position: "fixed", zIndex: 1, width: "100%"}}>
        <div className="logo" />
        <ClientNavbar />
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
            <Route path="/" element={<HomePage />} />
            <Route path="/introduction" element={<IntroductionPage />} />
          </Routes>
        </div>
      </Content>
      <Footer>
        <ClientFooter />
      </Footer>
    </Layout>
  </>);
}

export default ClientView;