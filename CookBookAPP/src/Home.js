import { useState, useEffect } from "react";
import Pin from "./Pin";

const Home = () => {
  const [pins, setPins] = useState([]);

  const fetchPins = () => {
    fetch("http://127.0.0.1:8000/pins")
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        setPins(data);
      });
  };

  useEffect(() => {
    fetchPins();
  }, []);

  return (
    <>
      <h1>Pinned</h1>
      <div>
        {pins.map((pin) => (
          <Pin key={pin.id} data={pin} />
        ))}
      </div>
    </>
  );
};
export default Home;
