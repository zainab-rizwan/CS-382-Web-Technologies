import { Route, Routes } from "react-router-dom";
import { routerType } from "../types/router.types";
import pagesData from "./pages-data"; 
import React from "react";

const Routing = () => {
  const pageRoutes = pagesData.map(({ path, title, element }: routerType) => {
    <p>hello</p>
    return <Route key={title} path={`/${path}`} element={element} />;

  });

  return <Routes>{pageRoutes}</Routes>;
};

export default Routing;