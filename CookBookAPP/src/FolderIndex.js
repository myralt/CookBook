import { useState, useEffect } from "react";
import FolderLink from "./FolderLink";

const FolderIndex = () => {
  const [links, setLinks] = useState([]);

  const fetchFolders = () => {
    fetch("http://127.0.0.1:8000/all/folders")
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        setLinks(data);
      });
  };

  useEffect(() => {
    fetchFolders();
  }, []);

  return (
    <>
      <h1>All Folders</h1>
      {links.map((link) => (
        <FolderLink key={link.name} data={link} />
      ))}
    </>
  );
};
export default FolderIndex;
