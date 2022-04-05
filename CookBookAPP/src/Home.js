import { useState, useEffect } from "react";

function Home() {
  const initialState = [{}];
  const [pins, setPins] = useState(initialState);

  useEffect(() => {
    const getPins = async () => {
      const data = await fetch("http://127.0.0.1:8000/pins").then((response) =>
        response.json()
      );

      setPins(data);
    };

    getPins();
  }, []);

  return (
    <>
      <h1>Pinned</h1>
      <p>{pins[0].name}</p>
    </>
  );
}
export default Home;
