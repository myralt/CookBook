import React from "react";
import ReactDOM from "react-dom";
import "./index.css";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import App from "./App";
import Home from "./Home";
import RecipeForm from "./RecipeForm";
import FolderIndex from "./FolderIndex";
import Folder from "./Folder";
import Recipe from "./Recipe";
import Pantry from "./Pantry";
import ListIndex from "./ListIndex";
import List from "./List";

ReactDOM.render(
  <BrowserRouter>
    <Routes>
      <Route path="/" element={<App />}>
        <Route path="/" element={<Home />} />
        <Route path="recipes" element={<FolderIndex />} />
        <Route path="recipes/:folderName" element={<Folder />} />
        <Route path="recipes/:folderName/:recipeId" element={<Recipe />} />
        <Route path="new-recipe" element={<RecipeForm />} />
        <Route path="pantry" element={<Pantry />}>
          <Route path="lists" element={<ListIndex />} />
          <Route path="lists/:listName" element={<List />} />
        </Route>
      </Route>
    </Routes>
  </BrowserRouter>,
  document.getElementById("root")
);
