import { Link, Outlet } from "react-router-dom";

function Pantry() {
  return (
    <>
      <p>pantry</p>
      <Link to={"lists"}>View Lists</Link>
      <Outlet />
    </>
  );
}

export default Pantry;
