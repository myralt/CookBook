import React from "react";
import ReactDOM from "react-dom";
import "./index.css";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import App from "./App";
import Home from "./Home";
import RecipeForm from "./RecipeForm";
import RecipeIndex from "./RecipeIndex";
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
        <Route path="recipes" element={<RecipeIndex />} />
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

// entrypoint of application: common layout (side navigation, header, main content)
// homepage - main content layout: search bar, pin grid
// folders aka recipes - main content layout: search bar, if no folders just a list of recipes, if folders, list of folders (all + others)
// new recipe form - main content is form
// pantry - search bar, main content is list of all products
