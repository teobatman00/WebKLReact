import { Button, Col, ColProps, Row, Space } from "antd";
import React from "react";
import {BsFillBarChartLineFill} from 'react-icons/bs'
import styles from './ServicePage.module.css';


const ServicePage = () => {

    return (<>
        <div style={{
            padding: '100px 60px',
            boxShadow: 'rgba(0, 0, 0, 0.16) 0px 1px 4px'
        }}>
            <h1 className={styles.title}>Dịch vụ</h1>
        </div>
        <div style={{
            padding: '40px 30px',
            margin: '10px 0',
            boxShadow: 'rgba(99, 99, 99, 0.2) 0px 2px 8px 0px'
            }}>
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
                    <Button type="primary" href="/">Đọc thêm</Button>
                </Col>
            </Row>
        </div>
        
        <div style={{
            padding: '40px 30px',
            margin: '10px 0',
            boxShadow: 'rgba(99, 99, 99, 0.2) 0px 2px 8px 0px'
            }}>
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
            
    </>);
}

export default ServicePage;