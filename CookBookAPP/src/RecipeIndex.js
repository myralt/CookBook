import { Link } from "react-router-dom";

function RecipeIndex() {
  return (
    <>
      <p>testing recipe index</p>
      <ul>
        <li>
          <Link to={"/recipes/folder1"}>Folder 1</Link>
        </li>
        <li>
          <Link to={"/recipes/folder2"}>Folder 2</Link>
        </li>
        <li>
          <Link to={"/recipes/folder3"}>Folder 3</Link>
        </li>
      </ul>
    </>
  );
}

export default RecipeIndex;
