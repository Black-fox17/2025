import React from 'react';
import { Suspense } from 'react';
import {Canvas} from '@react-three/fiber';
import { Leva, useControls} from 'leva';
import { PerspectiveCamera } from '@react-three/drei';
import Room from '../components/Room';
import CanvasLoader from '../components/CanvasLoader';
import { useMediaQuery } from 'react-responsive';


const Hero = () => {
    const x = useControls('Room', 
      {scalex:{value:0.07, min:0.01, max:0.1}, 
      scaley:{value:0.07, min:0.01, max:0.1},
      scalez:{value:0.07, min:0.01, max:0.1},
      positionx:{value:0, min:-10, max:10},
      positiony:{value:0, min:-10, max:10},
      positionz:{value:0, min:-10, max:10},
      rotationx:{value:0, min:0, max:360},
      rotationy:{value:280, min:0, max:360},
      rotationz:{value:0, min:0, max:360},

      }
    );
    const ismobile = useMediaQuery({maxWidth: 768});
    return (
        <section className="min-h-screen w-full flex flex-col relative" id="home">
            <div className="w-full mx-auto flex flex-col sm:mt-36 mt-20 c-space gap-3">
                <p className="sm:text-3xl text-xl font-medium text-white text-center font-generalsans">
                Hi, I am Oluwaseun <span className="waving-hand">👋</span>
                </p>
                <p className="hero_tag text-gray_gradient">Building Products & Brands</p>
            </div>
            <div className="w-full h-full absolute inset-0">
            <Leva />
                <Canvas className="w-full h-full">
                  <Suspense fallback={<CanvasLoader />}>
                    
                    <PerspectiveCamera makeDefault position={[0, 0, 30]} />
                    <Room scale = {[0.1 ]} position = {[2,-10,2]} rotation = {[0,-Math.PI,0]}/>
                    <ambientLight intensity={1} />
                    <directionalLight position={[10, 10, 10]} intensity={0.5} />
                  </Suspense>
                </Canvas>
            </div>
        </section>
    );
};  

export default Hero;