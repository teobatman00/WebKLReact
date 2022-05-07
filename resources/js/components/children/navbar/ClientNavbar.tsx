import { HomeOutlined } from "@ant-design/icons";
import { Menu, MenuProps } from "antd";
import React from "react";
import { NavLink } from "react-router-dom";


const navItem = [
  {
    to: "/",
    label: "Trang chu"
  },
  {
    to: "/introduction",
    label: "Gioi thieu"
  }
];

const ClientNavbar = () => {

  return (<>
    <Menu 
      theme="dark"
      mode="horizontal"
      defaultSelectedKeys={['/']}
    >
      <Menu.Item key={navItem[0].to}>
        <NavLink to={navItem[0].to}>
          <HomeOutlined />
          <span>{navItem[0].label}</span>
        </NavLink>
      </Menu.Item>
      <Menu.Item key={navItem[1].to}>
        <NavLink to={navItem[1].to}>
          <span>{navItem[1].label}</span>
        </NavLink>
      </Menu.Item>
      <Menu.Item key={navItem[1].to}>
        <NavLink to={navItem[1].to}>
          <span>{navItem[1].label}</span>
        </NavLink>
      </Menu.Item>

    </Menu>
  </>);
}

export default ClientNavbar;