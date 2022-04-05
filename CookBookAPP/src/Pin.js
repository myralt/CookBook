function Pin(props) {
  return (
    <>
      <h2>{props.data.name}</h2>
      <img
        alt="placeholder"
        src={"/" + props.data.image}
        height="250"
        width="300"
      />
      <p>Time: {props.data.cookingTime} mins</p>
      <p>Servings: {props.data.persons}</p>
    </>
  );
}
export default Pin;
