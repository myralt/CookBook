import { useState, useEffect } from "react";
import { Link, Outlet } from "react-router-dom";

const Pantry = () => {
  const [products, setProducts] = useState([]);

  const fetchProducts = () => {
    fetch("http://127.0.0.1:8000/all/products")
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        setProducts(data);
      });
  };

  useEffect(() => {
    fetchProducts();
  }, []);

  return (
    <>
      <ul>
        {products.map((product) => (
          <li key={product.id}>{product.name}</li>
        ))}
      </ul>
      <Link to={"lists"}>View Lists</Link>
      <Outlet />
    </>
  );
};
export default Pantry;
