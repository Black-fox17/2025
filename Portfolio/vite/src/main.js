import * as Three from 'three'
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js'

const canvas = document.getElementById('canvas')

const scene = new Three.Scene()
scene.background = new Three.Color('#F0F0F0')

const camera = new Three.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.z = 5

const geometry = new Three.DodecahedronGeometry()
const material = new Three.MeshLambertMaterial({ color: '#468585' , emissive: '#468585' })

const dodecahetra = new Three.Mesh(geometry, material)
scene.add(dodecahetra)

const boxgeometry = new Three.BoxGeometry(2,0.1,2);
const boxmaterial = new Three.MeshLambertMaterial({ color: '#B4B4B3' , emissive: '#B4B4B3' });

const box = new Three.Mesh(boxgeometry, boxmaterial);
box.position.y = -1.5;
scene.add(dodecahetra)
scene.add(box);

const light = new Three.DirectionalLight(0x006769, 100);
light.position.set(1, 1, 1);
scene.add(light);

const renderer = new Three.WebGLRenderer({ canvas });
renderer.setSize(window.innerWidth, window.innerHeight);
renderer.setPixelRatio(window.devicePixelRatio);
renderer.render(scene, camera);

const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true;
controls.dampingFactor = 0.05;
controls.enableZoom = true;
controls.enablePan = true;

function animate() {
  requestAnimationFrame(animate);
  dodecahetra.rotation.x += 0.01;
  dodecahetra.rotation.y += 0.01;

  box.rotation.y += 0.01;
  controls.update();
  renderer.render(scene, camera);
}

animate();

window.addEventListener('resize', () => {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
});