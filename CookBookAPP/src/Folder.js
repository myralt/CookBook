import { useState, useEffect } from "react";
import { useParams, Link } from "react-router-dom";

const Folder = () => {
  const params = useParams();
  const [recipes, setRecipes] = useState([]);

  const fetchRecipes = () => {
    const id = params.folderName;
    fetch(`http://127.0.0.1:8000/all/folders/${id}`)
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        setRecipes(data);
      });
  };

  useEffect(() => {
    fetchRecipes();
  }, []);

  return (
    <>
      <Link to={"/recipes"}>Back to Index</Link>
      {recipes.map((recipe) => (
        <div key={recipe.name}>
          <Link to={"/recipes/" + params.folderName + "/" + recipe.id}>
            <h2>{recipe.name}</h2>
            <p>{recipe.description}</p>
            <p>{recipe.cookingTime} min</p>
            <p>{recipe.persons} persons</p>
            <p>{recipe.rating} stars</p>
          </Link>
        </div>
      ))}
    </>
  );
};
export default Folder;
