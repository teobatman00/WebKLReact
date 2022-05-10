import React from "react";
import { List, Space, Typography } from "antd";
import { CheckCircleOutlined } from "@ant-design/icons";

const majorList: Array<string> = [
  "Kinh tế",
  "Quản trị kinh doanh",
  "Tài chính - Ngân hàng",
  "Kinh doanh thương mại",
  "Tiếng anh thương mại"
];

const IntroductionPage = () => {


  return (<>
    <h1 style={{
      textAlign: 'center',
      textTransform: 'uppercase',
      fontWeight: "bold",
      fontSize: '40px'
    }}>Giới thiệu Luận văn hải minh</h1>
    <div id="content">
      <h2>Giới thiệu chung</h2>
      <p>Thành lập từ năm 2005 - với 12 năm kinh nghiệm, nhóm Luận Văn Việt là nơi hội tụ của hơn 300 thành viên ưu tú đã tốt nghiệp Đại Học, Cao học, Tiến sĩ loại Giỏi tại các trường hàng đầu như: ĐH Kinh Tế Quốc Dân, ĐH Ngoại Thương, Học viện Ngân Hàng, Học viện tài chính, ĐH Khoa học xã hội và nhân văn, ĐH Bách Khoa.. cũng như các trường đại học nước ngoài và các trường liên kết.</p>
      <p>Luận Văn Việt chúng tôi luôn tự hào là một trong số ít các nhóm đi đầu trong lĩnh vực tư vấn - hỗ trợ khách hàng hình thành ý tưởng. Từ đó các bạn có thể hoàn thiện các bài tiểu luận, báo cáo, luận văn, chuyên đề tốt nghiệp Đại học, Cao học, Tại chức … ở tất cả các chuyên ngành Kinh tế, Văn hoá, Xã hội …</p>

      <h2>Chuyên ngành hỗ trợ</h2>
      <p>Dịch vụ viết thuê luận văn, tiểu luận, xử lý số liệu SPSS và viết thuê luận văn bằng tiếng anh của chúng tôi cung cấp tất cả các chuyên ngành phổ biến tại các trường đại học ở Việt Nam như:</p>
      <List
        dataSource={majorList}
        renderItem={item => (
          <List.Item style={{border: 0, padding:'5px 0'}}>
            <Space>
              <CheckCircleOutlined />
              {item}
            </Space>
          </List.Item>
        )}
      />

    </div>

  </>);
}

export default IntroductionPage;