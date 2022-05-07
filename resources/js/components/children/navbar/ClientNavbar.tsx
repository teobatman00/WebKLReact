import { Menu, MenuProps } from "antd";
import React, { Component } from "react";
import { NavLink } from "react-router-dom";

interface NavClient {
  navItem: {
    icon?: JSX.Element,
    to: string,
    label: string
  }[];
}

const ClientNavbar: React.FC<NavClient> = ({navItem}) => {

  return (<>
    <Menu 
      theme="dark"
      mode="horizontal"
      defaultSelectedKeys={['/']}
    >
      {navItem.map(i => (
        <Menu.Item key={i.to}>
          <NavLink to={i.to}>
            {i.icon}
            <span>{i.label}</span>
          </NavLink>
        </Menu.Item>
      ))}
    </Menu>
  </>);
}

export default ClientNavbar;