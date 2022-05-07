import React from "react";
import DocumentMeta from "react-document-meta";
import Meta from "../../../models/Meta";
import { clientRouterPath } from "../ClientView";


const IntroductionPage = () => {

  const meta: Meta = {
    title: "Giới thiệu",
    description: "Giới thiệu luận văn",
    canonical: process.env.MIX_APP_URL + clientRouterPath.introduction,
    meta: {
      name: {
        keywords: "Giới thiệu, luận văn"
      }
    }
  }
  
  return (<>
    <DocumentMeta {...meta}>
      <h1>This is introduction page</h1>
    </DocumentMeta>
    
  </>);
}

export default IntroductionPage;