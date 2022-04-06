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
        <br />
        <label htmlFor="description">Short Description :</label>
        <textarea
          id="description"
          name="description"
          cols="50"
          rows="5"
          required
        ></textarea>
        <br />
        <label htmlFor="servings">Number of servings :</label>
        <input type="number" id="servings" name="servings" min="1" required />
        <br />
        <label htmlFor="time">Average Time (in minutes) :</label>
        <input type="number" id="time" name="time" required />
        <br />
        <label htmlFor="rating">Your Rating :</label>
        <input type="number" id="rating" name="rating" min="1" required />
        <br />

        <div id="ingredients">
          <h2>Ingredients :</h2>
          <button onClick={addIngredient}>Add an ingredient</button>
          {ingredients}
        </div>

        <label htmlFor="steps">Preparation Steps</label>
        <textarea
          id="steps"
          name="steps"
          cols="50"
          rows="10"
          placeholder="Ie: 1. Dice the vegetables..."
          required
        ></textarea>
        <br />

        <label htmlFor="pin">Do you want to pin this ?</label>
        <input type="checkbox" id="pin" name="pin" />
        <br />

        <label htmlFor="folder">Select a folder :</label>
        <select id="folder" name="folder">
          <option value="">No folder</option>
        </select>
        <br />

        <input type="submit" value="Save Recipe" />
      </form>
    </>
  );

  function validateSubmission(event) {
    event.preventDefault();
    const inputs = document.forms[0];
    let formData = new FormData();

    formData.append("name", inputs.elements["name"].value);
    formData.append("rating", inputs.elements["rating"].value);
    formData.append("description", inputs.elements["description"].value);
    formData.append("persons", inputs.elements["servings"].value);
    formData.append("cookingTime", inputs.elements["time"].value);
    formData.append("preparation", inputs.elements["steps"].value);

    if (inputs.elements["pin"].checked) {
      formData.append("pinned", true);
    }

    const folder = inputs.elements["folder"].value;
    if (folder !== "") {
      formData.append("folder", { name: folder });
    }

    for (let key of formData.entries()) {
      console.log(key[0] + ": " + key[1]);
    }
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
