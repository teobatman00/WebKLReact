import React from "react";
import { Row, Col } from "antd";

const ClientFooter = () => {

  return (<>
    <Row style={{color: 'white', padding: '60px 40px', background: '#001529'}}>
      <Col span={6}>
        Column
      </Col>
      <Col span={6}>
        Column
      </Col>
      <Col span={6}>
        Column
      </Col>
      <Col span={6}>
        Column
      </Col>
    </Row>
    <div style={{
      padding: '30px 40px', 
      textAlign:'center', 
      color:'white',
      background: '#001540'
    }}>
      Bản quyền thuộc về Luận văn Hải Minh
    </div>
  </>);
}

export default ClientFooter;