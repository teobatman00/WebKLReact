import { Card, Col, Row } from "antd";
import React from "react";

const { Meta } = Card;

const BlogPage = () => {

    return (<>
        <h1 style={{
            textTransform: 'uppercase',
            padding: '10px',
            boxShadow: 'rgba(0, 0, 0, 0.16) 0px 1px 4px',
            fontWeight: 'bold'
        }}>Bài viết</h1>
        <div>
            <Row gutter={16}>
                <Col span={6}>
                    <Card
                        hoverable
                        style={{ width: '100%' }}
                        cover={<img alt="example" src="https://os.alipayobjects.com/rmsportal/QBnOOoLaAfKPirc.png" />}
                    >
                        <Meta title="Europe Street beat" />
                    </Card>
                </Col>
                <Col span={6}>
                    <Card
                        hoverable
                        style={{ width: '100%' }}
                        cover={<img alt="example" src="https://os.alipayobjects.com/rmsportal/QBnOOoLaAfKPirc.png" />}
                    >
                        <Meta title="Europe Street beat" />
                    </Card>
                </Col>
                <Col span={6}>
                    <Card
                        hoverable
                        style={{ width: '100%' }}
                        cover={<img alt="example" src="https://os.alipayobjects.com/rmsportal/QBnOOoLaAfKPirc.png" />}
                    >
                        <Meta title="Europe Street beat" />
                    </Card>
                </Col>
                <Col span={6}>
                    <Card
                        hoverable
                        style={{ width: '100%' }}
                        cover={<img alt="example" src="https://os.alipayobjects.com/rmsportal/QBnOOoLaAfKPirc.png" />}
                    >
                        <Meta title="Europe Street beat" />
                    </Card>
                </Col>
            </Row>
        </div>
    </>);
}

export default BlogPage;