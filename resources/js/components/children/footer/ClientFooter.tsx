import React from "react";
import { Row, Col, Divider, List, Typography } from "antd";
import { HomeOutlined } from "@ant-design/icons";

interface FooterListItem {
  title: string,
  url: string,
  icon?:JSX.Element
}

const ClientFooter = () => {

  const data = [
    'Racing car sprays burning fuel into crowd.',
    'Japanese princess to wed commoner.',
    'Australian walks 100km after outback crash.',
    'Man charged over missing wedding girl.',
    'Los Angeles battles huge wildfires.',
  ];

  return (<>
    <Row style={{ padding: '60px 40px', background: '#001529' }}>
      <Col span={6}>
        <Divider orientation="center" style={{color: 'white', borderBottom: '1px solid white', paddingBottom: '20px'}}>Default Size</Divider>
        <List
          dataSource={data}
          renderItem={item => (
            <List.Item style={{ border: 'none', color:'white'}}>
              <Typography.Text style={{color:'white'}}><HomeOutlined /></Typography.Text> 
              {item}
            </List.Item>
          )}
        />
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
      textAlign: 'center',
      color: 'white',
      background: '#001540'
    }}>
      Bản quyền thuộc về Luận văn Hải Minh
    </div>
  </>);
}

export default ClientFooter;