import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import { createTheme } from '@mui/material';

const theme = createTheme({
  palette: {
    palette1: {
      light: '#E3E8E9',
      main: '#818E9A',
      dark: '#1D2842',
      contrastText: 'rgba(0, 0, 0, 0.87)',
    },
    palette2: {
      main: '#81A3BF',
      light: '#CCD4DF',
      dark: '#1A667A'
    },
  },
  typography: {
    fontFamily: 'Raleway, Arial',
  },
});


ReactDOM.render(<App />, document.getElementById('root'));


