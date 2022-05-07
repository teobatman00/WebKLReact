import React, { useEffect } from "react";
import DocumentMeta from "react-document-meta";
import Meta from "../../../models/Meta";
import { clientRouterPath } from "../ClientView";


const HomePage = () => {

  const meta: Meta = {
    title: "Trang chủ",
    description: "Trang chủ luận văn",
    canonical: process.env.MIX_APP_URL + clientRouterPath.home,
    meta: {
      name: {
        keywords: "Luận văn"
      }
    }
  }

  return (<>
    <DocumentMeta {...meta}>
      <h1>This is a home page</h1>
    </DocumentMeta>
    
  </>);
}

export default HomePage;