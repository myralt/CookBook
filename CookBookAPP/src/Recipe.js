import { useState, useEffect } from "react";
import { useParams } from "react-router-dom";

const Recipe = () => {
  const params = useParams();
  const [recipe, setRecipe] = useState([]);

  const fetchRecipe = () => {
    const id = params.recipeId;
    fetch(`http://127.0.0.1:8000/all/recipes/${id}`)
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        setRecipe(data);
      });
  };

  useEffect(() => {
    fetchRecipe();
  }, []);

  return (
    <>
      <h1>{recipe.name}</h1>
      <p>{recipe.creationDate}</p>
      <p>{recipe.rating}</p>
      <h2>Ingredients</h2>
      <h2>Description</h2>
      <p>{recipe.description}</p>
      <h2>Preparation</h2>
      <p>{recipe.preparation}</p>
    </>
  );
};

export default Recipe;
