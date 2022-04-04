function IngredientFormFields(props) {
  return (
    <>
      <input type="number" name={"quantity" + props.count} min="1" />
      <select name={"unit" + props.count}>
        <option value="unit">unit(s)</option>
        <option value="gr">gr.</option>
        <option value="ml">ml.</option>
      </select>
      <select name={"product" + props.count}>
        <option value="">-- Select a product from previous saves --</option>
      </select>
      <span>Or</span>
      <input type="text" name={"newproduct" + props.count} />
    </>
  );
}
export default IngredientFormFields;
