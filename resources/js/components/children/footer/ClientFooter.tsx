import React, { ReactNode } from "react";
import { Row, Col, Divider, List, Typography, Space, ColProps } from "antd";
import { AimOutlined, HomeOutlined, MailOutlined, PhoneOutlined } from "@ant-design/icons";
import { navItem } from "../../views/ClientView";
import { Link } from "react-router-dom";
import styles from './ClientFooter.module.css';

interface FooterListItem {
  title?: string,
  url?: string,
  icon?: ReactNode
}


const contact:Array<FooterListItem> = [

  {
    title: '341 Cao Đạt, P1, Q5',
    icon: <AimOutlined />
  },
  {
    title: 'minhduongb97@gmail.com',
    icon: <MailOutlined />
  },
  {
    title: '0916 310 208',
    icon: <PhoneOutlined />
  }
];

const policy:Array<FooterListItem> =[
  {
    title: "Chính sách bảo hành",
    url: "/"
  },
  {
    title: "Chính sách bảo mật",
    url: "/"
  },
  {
    title: "Chính sách hoàn tiền",
    url: "/"
  }
];

const colProps: ColProps = {
  xs: {
    span: 24
  },
  md: {
    span: 12
  },
  lg: {
    span: 6
  }
}

const ClientFooter = () => {

  return (<>
    <div style={{ background: '#001529', padding: '60px 40px' }}>
      <Row gutter={{ lg: 40, md: 20, xs:0}}>
        <Col {...colProps}>
          <Divider orientation="center" style={{ color: 'white', borderBottom: '1px solid white', paddingBottom: '20px' }}>Liên hệ với chúng tôi</Divider>
          <List
            dataSource={contact}
            renderItem={item => (
              <List.Item style={{ border: 'none', color: 'white' }}>
                <Space>
                  <Typography.Text style={{ color: 'white' }}>{item.icon} </Typography.Text>
                  {item.title}
                </Space>
              </List.Item>
            )}
          />
        </Col>
        <Col {...colProps}>
          <Divider orientation="center" style={{ color: 'white', borderBottom: '1px solid white', paddingBottom: '20px' }}>Thông tin</Divider>
          <List
            dataSource={navItem}
            renderItem={item => (
              <List.Item style={{ border: 'none'}}
              >
                <Link to={item.to} className={styles.item_link}>{item.label}</Link>
              </List.Item>
            )}
          />
        </Col>
        <Col {...colProps}>
          <Divider orientation="center" style={{ color: 'white', borderBottom: '1px solid white', paddingBottom: '20px' }}>Điều khoản - Chính sách</Divider>
          <List
            dataSource={policy}
            renderItem={item => (
              <List.Item style={{ border: 'none', color: 'white' }}>
                {item.url && <Link to={item.url} className={styles.item_link}> {item.title} </Link>}
              </List.Item>
            )}
          />
        </Col>
        <Col {...colProps}>
          <Divider orientation="center" style={{ color: 'white', borderBottom: '1px solid white', paddingBottom: '20px' }}>Google Map</Divider>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.8776006519927!2d106.68135784095455!3d10.75334042261864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fe89ef15a5f%3A0x127c6e03ca94934c!2zQ2h1bmcgQ8awIFBow7pjIFRoaW5o!5e0!3m2!1svi!2s!4v1652020379208!5m2!1svi!2s"
          style={{border: '0', width: '100%', height: '250'}} allowFullScreen loading="lazy" referrerPolicy="no-referrer-when-downgrade"></iframe>
        </Col>
      </Row>
    </div>
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