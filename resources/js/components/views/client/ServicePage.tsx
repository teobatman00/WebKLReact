import { Button, Col, ColProps, Row, Space } from "antd";
import React from "react";
import {BsFillBarChartLineFill} from 'react-icons/bs'
import styles from './ServicePage.module.css';


const ServicePage = () => {

    return (<>
        <h1 style={{
            textAlign: 'center',
            textTransform: 'uppercase',
            fontWeight: "bold",
            fontSize: '40px'
        }}>Dịch vụ</h1>
        
        <div style={{padding: '60px 0'}}>
            <Row gutter={[32,0]}>
                <Col
                    xs={{
                        span: 24
                    }}
                    md={{
                        span: 3,
                    }}
                >
                    <BsFillBarChartLineFill size={80} className={styles.icon}/>
                </Col>
                <Col
                    xs={{
                        span: 24
                    }}
                    md={{
                        span: 21,
                    }}
                >
                    <h2>Dịch vụ phân tích SPSS</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque recusandae repellat id in amet error ipsa esse, nostrum eaque commodi ex, quae dolorem magni delectus beatae perspiciatis quo quia quam?</p>
                    <Button type="primary">Đọc thêm</Button>
                </Col>
            </Row>
        </div>
        
        <Row gutter={[32,0]}>
            <Col
                xs={{
                    span: 24
                }}
                md={{
                    span: 3,
                }}
            >
                <BsFillBarChartLineFill size={80} className={styles.icon}/>
            </Col>
            <Col
                xs={{
                    span: 24
                }}
                md={{
                    span: 21,
                }}
            >
                <h2>Dịch vụ phân tích SPSS</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque recusandae repellat id in amet error ipsa esse, nostrum eaque commodi ex, quae dolorem magni delectus beatae perspiciatis quo quia quam?</p>
                <Button type="primary">Đọc thêm</Button>
            </Col>
        </Row>
            
    </>);
}

export default ServicePage;