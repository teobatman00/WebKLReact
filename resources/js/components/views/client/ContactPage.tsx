import React from "react";
import {Button, Col, Input, InputNumber, Row, Form, List, Typography} from "antd";

const layout = {
    labelCol: { span: 4 },
    wrapperCol: { span: 16 },
};

/* eslint-disable no-template-curly-in-string */
const validateMessages = {
    required: '${label} is required!',
    types: {
        email: '${label} is not a valid email!',
        number: '${label} is not a valid number!',
    },
    number: {
        range: '${label} must be between ${min} and ${max}',
    },
};

const data = [
    'Hotline: 0916310208',
    'Email: minhduongb97@gmail.com',
    'Địa chỉ: 341 Cao Đạt, Phường 1, Quận 5, TPHCM'
];

const ContactPage = () => {

    const onFinish = (values: any) => {
        console.log(values);
    };

    return (<>
        <h1 style={{
            textTransform: 'uppercase',
            padding: '10px',
            boxShadow: 'rgba(0, 0, 0, 0.16) 0px 1px 4px',
            fontWeight: 'bold',
            textAlign: 'center'
        }}>Liên hệ</h1>
        <div style={{
            padding: '15px 0'
        }}>
            <Row gutter={[8,8]}>
                <Col span={12}>
                    <h3>Thông tin chi tiết</h3>
                    <List
                        dataSource={data}
                        renderItem={item => (
                            <List.Item style={{border: 'none'}}>
                                {item}
                            </List.Item>
                        )}
                    />
                    <div>
                        <h3>Gửi ý kiến cho chúng tôi</h3>
                        <Form {...layout} name="nest-messages" onFinish={onFinish} validateMessages={validateMessages}>
                            <Form.Item name={['user', 'name']} label="Name" rules={[{ required: true }]}>
                                <Input />
                            </Form.Item>
                            <Form.Item name={['user', 'email']} label="Email" rules={[{ type: 'email' }]}>
                                <Input />
                            </Form.Item>
                            <Form.Item name={['user', 'age']} label="Age" rules={[{ type: 'number', min: 0, max: 99 }]}>
                                <InputNumber />
                            </Form.Item>
                            <Form.Item name={['user', 'website']} label="Website">
                                <Input />
                            </Form.Item>
                            <Form.Item name={['user', 'introduction']} label="Introduction">
                                <Input.TextArea />
                            </Form.Item>
                            <Form.Item wrapperCol={{ ...layout.wrapperCol, offset: 8 }}>
                                <Button type="primary" htmlType="submit">
                                    Submit
                                </Button>
                            </Form.Item>
                        </Form>
                    </div>
                </Col>
                <Col span={12}>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.8776006519927!2d106.68135784095455!3d10.75334042261864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fe89ef15a5f%3A0x127c6e03ca94934c!2zQ2h1bmcgQ8awIFBow7pjIFRoaW5o!5e0!3m2!1svi!2s!4v1652020379208!5m2!1svi!2s"
                            style={{border: '0', width: '100%', height: '350'}}
                            allowFullScreen loading="lazy" referrerPolicy="no-referrer-when-downgrade"></iframe>
                </Col>
            </Row>
        </div>

    </>);
}

export default ContactPage;
