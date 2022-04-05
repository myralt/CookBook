import { Link } from "react-router-dom";
import "./NavBar.css";

function NavBar() {
  return (
    <nav>
      <ul>
        <li>
          <Link to="/" title="Back to Home">
            Home
          </Link>
        </li>
        <li>
          <Link to="/recipes" title="View all recipes">
            View all recipes
          </Link>
        </li>
        <li>
          <Link to="/new-recipe" title="New recipe">
            New Recipe
          </Link>
        </li>
        <li>
          <Link to="/pantry" title="View pantry">
            View pantry
          </Link>
        </li>
      </ul>
    </nav>
  );
}
export default NavBar;
