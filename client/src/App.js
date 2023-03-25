import { BrowserRouter, Navigate, Routes, Route } from "react-router-dom";
import Dashboard from "scenes/employer-pages/dashboard";
import Routing from "scenes/router";
import { useMemo } from "react";
import { useSelector } from "react-redux";
import { CssBaseline, ThemeProvider } from "@mui/material";
import { createTheme } from "@mui/system";
import { themeSettings } from "theme";

const App = () => {
  return (
    <BrowserRouter>
      <ThemeProvider theme={theme}>
        <CssBaseline/>
        <Routes>
          <Routing />
        </Routes>
      </ThemeProvider>
    </BrowserRouter>
  );
};

export default App;
