import * as THREE from './vendor/three.module.min.js';

const canvas = document.getElementById('hero-three-canvas');

if (canvas) {
	const wrapper = canvas.parentElement;
	const renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true, powerPreference: 'high-performance' });
	const scene = new THREE.Scene();
	const camera = new THREE.PerspectiveCamera(32, 1, 0.1, 100);
	const card = new THREE.Group();
	const targetRotation = new THREE.Vector2();
	const motionReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	let active = true;
	let frameId;

	renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5));
	renderer.outputColorSpace = THREE.SRGBColorSpace;
	camera.position.z = 7.2;
	card.position.set(0, 0, 0);
	card.scale.setScalar(0.9);
	scene.add(card);

	const roundedShape = (width, height, radius) => {
		const left = -width / 2;
		const right = width / 2;
		const top = height / 2;
		const bottom = -height / 2;
		const shape = new THREE.Shape();
		shape.moveTo(left + radius, bottom);
		shape.lineTo(right - radius, bottom);
		shape.quadraticCurveTo(right, bottom, right, bottom + radius);
		shape.lineTo(right, top - radius);
		shape.quadraticCurveTo(right, top, right - radius, top);
		shape.lineTo(left + radius, top);
		shape.quadraticCurveTo(left, top, left, top - radius);
		shape.lineTo(left, bottom + radius);
		shape.quadraticCurveTo(left, bottom, left + radius, bottom);
		return shape;
	};

	const frame = new THREE.Mesh(new THREE.ExtrudeGeometry(roundedShape(3.35, 3.35, 0.34), { depth: 0.12, bevelEnabled: true, bevelThickness: 0.04, bevelSize: 0.04, bevelSegments: 3, curveSegments: 24 }), new THREE.MeshBasicMaterial({ color: 0x121212 }));
	const photo = new THREE.Mesh(new THREE.ShapeGeometry(roundedShape(3.05, 3.05, 0.22)), new THREE.MeshBasicMaterial({ color: 0xf0f0f0 }));
	const shadowCanvas = document.createElement('canvas');
	shadowCanvas.width = 256;
	shadowCanvas.height = 256;
	const shadowContext = shadowCanvas.getContext('2d');
	const shadowGradient = shadowContext.createRadialGradient(128, 128, 18, 128, 128, 128);
	shadowGradient.addColorStop(0, 'rgba(0, 0, 0, 0.24)');
	shadowGradient.addColorStop(1, 'rgba(0, 0, 0, 0)');
	shadowContext.fillStyle = shadowGradient;
	shadowContext.fillRect(0, 0, 256, 256);
	const shadow = new THREE.Mesh(new THREE.PlaneGeometry(3.7, 3.7), new THREE.MeshBasicMaterial({ map: new THREE.CanvasTexture(shadowCanvas), transparent: true, depthWrite: false }));
	shadow.position.set(0.08, -0.1, -0.08);
	shadow.scale.y = 0.7;
	card.add(shadow);
	photo.position.z = 0.22;
	card.add(frame, photo);

	new THREE.TextureLoader().load('/wp-content/themes/portfolio/assets/hero-portrait.jpg', loadedTexture => {
		loadedTexture.colorSpace = THREE.SRGBColorSpace;
		loadedTexture.wrapS = THREE.ClampToEdgeWrapping;
		loadedTexture.wrapT = THREE.ClampToEdgeWrapping;
		loadedTexture.repeat.set(0.105, 0.15);
		loadedTexture.offset.set(0.55, 0.57);
		photo.material.map = loadedTexture;
		photo.material.color.set(0xffffff);
		photo.material.needsUpdate = true;
	});

	const resize = () => {
		const { width, height } = wrapper.getBoundingClientRect();
		if (!width || !height) return;
		renderer.setSize(width, height, false);
		camera.aspect = width / height;
		camera.updateProjectionMatrix();
	};

	const onPointerMove = event => {
		if (window.scrollY > 600) return;
		const x = (event.clientX / window.innerWidth) * 2 - 1;
		const y = (event.clientY / window.innerHeight) * 2 - 1;
		targetRotation.set(y * 0.2, x * 0.28);
	};

	const render = () => {
		if (!active) return;
		card.rotation.x += (targetRotation.x - card.rotation.x) * 0.22;
		card.rotation.y += (targetRotation.y - card.rotation.y) * 0.22;
		if (motionReduced) {
			card.rotation.x = targetRotation.x;
			card.rotation.y = targetRotation.y;
		}
		renderer.render(scene, camera);
		frameId = requestAnimationFrame(render);
	};

	const observer = new IntersectionObserver(entries => {
		active = entries[0].isIntersecting;
		if (active) {
			cancelAnimationFrame(frameId);
			render();
		}
	}, { threshold: 0.01 });

	new ResizeObserver(resize).observe(wrapper);
	window.addEventListener('pointermove', onPointerMove, { passive: true });
	observer.observe(wrapper);
	resize();
	render();
}
