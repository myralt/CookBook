import { useState } from "react";
import IngredientFormFields from "./IngredientFormFields";

function RecipeForm() {
  const [ingredients, setIngredients] = useState([]);

  return (
    <>
      <h1>Create a new recipe</h1>
      <form onSubmit={validateSubmission}>
        <label htmlFor="name">Name of Recipe : </label>
        <input type="text" id="name" name="name" required />
        <label htmlFor="description">Short Description :</label>
        <textarea
          id="description"
          name="description"
          cols="50"
          rows="5"
          required
        ></textarea>
        <label htmlFor="servings">Number of servings :</label>
        <input type="number" id="servings" name="servings" min="1" required />
        <label htmlFor="time">Average Time (in minutes) :</label>
        <input type="number" id="time" name="time" required />
        <label htmlFor="rating">Your Rating :</label>
        <input type="number" id="rating" name="rating" min="1" required />

        <div id="ingredients">
          <h2>Ingredients :</h2>
          <button onClick={addIngredient}>Add an ingredient</button>
          {ingredients}
        </div>

        <label htmlFor="prep-steps">Preparation Steps</label>
        <textarea
          id="prep-steps"
          name="prep-steps"
          cols="50"
          rows="10"
          placeholder="Ie: 1. Dice the vegetables..."
          required
        ></textarea>

        <label htmlFor="pin">Do you want to pin this ?</label>
        <input type="checkbox" id="pin" name="pin" />

        <label htmlFor="folder">Select a folder :</label>
        <select id="folder" name="folder">
          <option value="">No folder</option>
        </select>

        <input type="submit" value="Save Recipe" />
      </form>
    </>
  );

  function validateSubmission(event) {
    event.preventDefault();
    console.log("No input yet.");
  }

  function addIngredient(event) {
    event.preventDefault();
    const idForRemoval = ingredients.length + 1;
    const ingredientSection = (
      <div key={idForRemoval.toString()} id={idForRemoval}>
        <IngredientFormFields />
        <button onClick={removeIngredient}>Remove</button>
      </div>
    );
    setIngredients([...ingredients, ingredientSection]);
  }

  function removeIngredient(event, array, id) {
    event.preventDefault();
    const removed = event.target.parentNode;
    document.getElementById("ingredients").removeChild(removed);
  }
}
export default RecipeForm;
