import { Card, Col, Row, Space, List, Avatar, Tag } from "antd";
import React from "react";
import { Desktop, Tablet, TabletAndAbove } from "../../MainApp";
import { StarOutlined, LikeOutlined, MessageOutlined } from "@ant-design/icons";
import styles from './BlogPage.module.css';
import PostPage from "./sub-page/PostPage";

const { Meta } = Card;

const listData: Array<any> = [];
for (let i = 0; i < 23; i++) {
    listData.push({
        href: 'https://ant.design',
        title: `ant design part ${i}`,
        avatar: 'https://joeschmoe.io/api/v1/random',
        description:
            'Ant Design, a design language for background applications, is refined by Ant UED Team.',
        content: 'Hello World'
    });
}

const IconText = ({ icon, text }: any) => (
    <Space>
        {React.createElement(icon)}
        {text}
    </Space>
);

const BlogPage = () => {

    return (<>
        <h1 style={{
            textTransform: 'uppercase',
            padding: '10px',
            boxShadow: 'rgba(0, 0, 0, 0.16) 0px 1px 4px',
            fontWeight: 'bold'
        }}>Bài viết</h1>
        <TabletAndAbove>
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
        </TabletAndAbove>
        <Row gutter={[8, 8]} style={{ padding: '15px 0' }}>
            <Col
                xs={{ span: 24 }}
                lg={{ span: 18 }}
            >
                <List
                    itemLayout="vertical"
                    size="large"
                    pagination={{
                        onChange: page => {
                            console.log(page);
                        },
                        pageSize: 4,
                    }}
                    dataSource={listData}
                    renderItem={item => (
                        <List.Item
                            className={styles.list_item}
                            key={item.title}
                            actions={[
                                <IconText icon={StarOutlined} text="156" key="list-vertical-star-o" />,
                                <IconText icon={LikeOutlined} text="156" key="list-vertical-like-o" />,
                                <IconText icon={MessageOutlined} text="2" key="list-vertical-message" />,
                            ]}
                        >
                            <h3><a href={item.href}>{item.title}</a></h3>
                            <List.Item.Meta
                                avatar={
                                    <img
                                        alt="logo"
                                        src="https://gw.alipayobjects.com/zos/rmsportal/mqaQswcyDLcXyDKnZfES.png"
                                        style={{
                                            width: '20vmin'
                                        }}
                                    />
                                }
                                description={
                                    <div>
                                        <p>{item.description}</p>
                                        <Tag color="blue">Hello</Tag>
                                    </div>
                                }
                            />
                        </List.Item>
                    )}
                />
            </Col>
            <Desktop>
                <Col span={6}>
                    <PostPage />
                </Col>
            </Desktop>

        </Row>


    </>);
}

export default BlogPage;
