import React, { CSSProperties, useEffect } from "react";
import MetaTags from "../../children/meta/MetaTags";
import { clientRouterPath } from "../ClientView";
import { Carousel, Col, ColProps, Row } from "antd";




const HomePage = () => {

  const bannerContentStyle: CSSProperties = {
    height: '250px',
    color: '#fff',
    lineHeight: '160px',
    textAlign: 'center',
    background: '#364d79'
  };

  const middleSection: CSSProperties = {
    padding: '60px 0 60px 0'
  }

  const colProps: ColProps = {
    xs: {
      span: 24
    },
    md: {
      span: 12
    },
    lg: {
      span: 8
    }
  }

  return (<>
    <MetaTags
      title="Luận văn Hải Minh - Trang chủ"
      description="Luận văn Hải Minh - Trang chủ"
      keyword="Luận văn, Trang chủ"
      permalink={clientRouterPath.home}
      type="Trang chủ luận văn"
    />
    <div id="banner_feature">
      <Carousel autoplay>
        <div>
          <h3 style={bannerContentStyle}>1</h3>
        </div>
        <div>
          <h3 style={bannerContentStyle}>2</h3>
        </div>
        <div>
          <h3 style={bannerContentStyle}>3</h3>
        </div>
        <div>
          <h3 style={bannerContentStyle}>4</h3>
        </div>
      </Carousel>
    </div>
    <div id="service" style={middleSection}>
      <h2 style={{ textAlign: 'center' }}>
        Dịch vụ luận văn Hải Minh
      </h2>

      <Row gutter={[40, 40]}>
        <Col {...colProps}>
          Colum
        </Col>
        <Col {...colProps} >
          Colum
        </Col>
        <Col {...colProps} >
          Colum
        </Col>

        <Col {...colProps} >
          Colum
        </Col>
        <Col {...colProps} >
          Colum
        </Col>
        <Col {...colProps} >
          Colum
        </Col>
      </Row>
    </div>
    <div id="reason" style={middleSection}>
      <h2 style={{ textAlign: 'center' }}>
        Vì sao nên chọn luận văn Hải Minh
      </h2>
      <Row gutter={[40, 40]}>
        <Col {...colProps}>
          Colum
        </Col>
        <Col {...colProps} >
          Colum
        </Col>
        <Col {...colProps} >
          Colum
        </Col>

        <Col {...colProps} >
          Colum
        </Col>
        <Col {...colProps} >
          Colum
        </Col>
        <Col {...colProps} >
          Colum
        </Col>
      </Row>
    </div>
    <div id="major" style={middleSection}>
      <h2 style={{ textAlign: 'center' }}>
        Các ngành luận văn Hải Minh hỗ trợ
      </h2>

      <Carousel autoplay>
        <div>
          <h3 style={bannerContentStyle}>1</h3>
        </div>
        <div>
          <h3 style={bannerContentStyle}>2</h3>
        </div>
        <div>
          <h3 style={bannerContentStyle}>3</h3>
        </div>
        <div>
          <h3 style={bannerContentStyle}>4</h3>
        </div>
      </Carousel>
    </div>

  </>);
}

export default HomePage;