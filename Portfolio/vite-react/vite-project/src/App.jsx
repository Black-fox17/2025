import { Canvas,useFrame } from '@react-three/fiber';
import { OrbitControls } from '@react-three/drei';
import React, { useRef } from 'react';

function RotatingCube(){
  const meshref = useRef();
  useFrame(() => {
    if(meshref.current){
      meshref.current.rotation.x += 0.01;
      meshref.current.rotation.y += 0.01;
    }
  });
  return (
    <mesh ref={meshref} scale={1}>
      <boxGeometry args={[2, 2, 2]} />
      <meshLambertMaterial color='#468585' emissive ='#468585' />
    </mesh>
  )
};


function App (){
  return (
    <Canvas style={{height: '100vh', width: '100vw'}}>
      <OrbitControls enableZoom enablePan enableRotate/>

      <directionalLight position={[1, 1, 1]} intensity={1} color= {0x9cdba6}/>
      <color attach="background" args={['#F0F0F0']} />

      <RotatingCube/>
    </Canvas>
  )
}
export default App;