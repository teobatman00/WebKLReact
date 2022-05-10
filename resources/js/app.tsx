import React from 'react';
import { hydrate } from "react-dom";
import MainApp from './components/MainApp';
import "../css/app.css";

hydrate(<MainApp />, 
document.getElementById("app"));


