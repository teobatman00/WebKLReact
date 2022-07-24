import React from "react";
import {Card} from "antd";

const PostPage = () => {
    return (
      <>
          <Card title="Bài viết mới nhất" extra={<a href="#">More</a>} style={{ width: '100%' }}>
              <p>Card content</p>
              <p>Card content</p>
              <p>Card content</p>
          </Card>
      </>
    );
}

export default PostPage;
