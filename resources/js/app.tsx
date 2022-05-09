import React from 'react';
import { hydrate } from "react-dom";
import MainApp from './components/MainApp';

hydrate(<MainApp />, 
document.getElementById("app"));


