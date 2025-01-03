import React from 'react';
import Navbar from './sections/Navbar.jsx';
import Hero from './sections/Hero.jsx';

function App (){
  return(
    <main className="max-w-7xl mx-auto text-center">
      <Navbar />
      <Hero />
    </main>
  )
}

export default App;