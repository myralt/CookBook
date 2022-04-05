function IngredientFormFields() {
  return (
    <>
      <input type="number" name="quantity" min="1" />
      <select name="unit">
        <option value="unit">unit(s)</option>
        <option value="gr">gr.</option>
        <option value="ml">ml.</option>
      </select>
      <select name="product">
        <option value="">-- Select a product from previous saves --</option>
      </select>
      <span>Or</span>
      <input type="text" name="newproduct" />
    </>
  );
}
export default IngredientFormFields;
