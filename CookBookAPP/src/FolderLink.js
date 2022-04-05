import { Link } from "react-router-dom";

const FolderLink = (props) => {
  return (
    <>
      <div>
        <h2>
          {props.data.id == null ? (
            <Link to={"/recipes/all"}>{props.data.name}</Link>
          ) : (
            <Link to={"/recipes/" + props.data.id}>{props.data.name}</Link>
          )}
        </h2>
      </div>
    </>
  );
};
export default FolderLink;
