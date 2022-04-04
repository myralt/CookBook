function RecipeForm() {
  return (
    <>
      <h1>Create a new recipe</h1>
      <form>
        <label for="name">Name of Recipe : </label>
        <input type="text" id="name" name="name" required />
        <label for="description">Short Description :</label>
        <textarea
          id="description"
          name="description"
          cols="50"
          rows="5"
          required
        ></textarea>
        <label for="servings">Number of servings :</label>
        <input type="number" id="servings" name="servings" min="1" required />
        <label for="time">Average Time (in minutes) :</label>
        <input type="number" id="time" name="time" required />
        <label for="rating">Your Rating :</label>
        <input type="number" id="rating" name="rating" min="1" required />

        <h2>Ingredients :</h2>
        <button>Add an ingredient</button>
        <input type="number" name="quantity0" min="1" required />
        <select name="unit0" required>
          <option>gr.</option>
          <option>ml.</option>
          <option selected>unit(s)</option>
        </select>
        <select name="product0" required>
          <option selected value="">
            -- Select a product from previous saves --
          </option>
        </select>
        <span>Or</span>
        <input type="text" name="newproduct0" />

        <label for="prep-steps">Preparation Steps</label>
        <textarea
          id="prep-steps"
          name="prep-steps"
          cols="50"
          rows="10"
          required
        >
          Ie: 1. Dice the vegetables...
        </textarea>

        <label for="pin">Do you want to pin this ?</label>
        <input type="checkbox" id="pin" name="pin" />

        <label for="folder">Select a folder :</label>
        <select id="folder" name="folder">
          <option selected value="">
            No folder
          </option>
        </select>

        <input type="submit" value="Save Recipe" />
      </form>
    </>
  );
}

export default RecipeForm;
