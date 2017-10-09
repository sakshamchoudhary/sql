'use strict';

var ballRadius = 10;
var pegCount = 16;
var pegSize = 50;
var maximumBalls = 200;
var ballEveryNFrames = 5;

var w = 750;
var h = 900;
var countX = 10;
var countY = 20;
var m = undefined;

var _Matter = Matter;
var Bodies = _Matter.Bodies;
var Body = _Matter.Body;
var Composite = _Matter.Composite;
var Engine = _Matter.Engine;
var Events = _Matter.Events;
var World = _Matter.World;

var canvas = undefined;
var engine = undefined;

var wheel = undefined;

function setup() {
	engine = Engine.create();
	Engine.run(engine);

	canvas = createCanvas(windowWidth, windowHeight);

	m = min(width, height);
	var rat = 1 / 5 * 2;
	var r = m * rat;

	var parts = [];

	for (var i = 0; i < pegCount; i++) {
		var segment = TAU / pegCount;
		var angle = i / pegCount * TAU;
		var angle2 = i / pegCount * TAU + segment / 2;
		var x = cos(angle);
		var y = sin(angle);
		var x2 = cos(angle2);
		var y2 = sin(angle2);
		var cx = x * r;
		var cy = y * r;
		var cx2 = x2 * r;
		var cy2 = y2 * r;
		var circ = addCircle({ x: cx, y: cy, r: pegSize / 1000 * m, options: { isStatic: true, label: 'peg' } });
		var rect = addRect({ x: cx2, y: cy2, w: 100 / 1000 * m, h: 30 / 1000 * m, options: { angle: angle2 + HALF_PI, isStatic: true } });
		parts.push(circ, rect);
	}

	wheel = Body.create({ parts: parts, isStatic: true });
}

function addBody() {
	for (var _len = arguments.length, bodies = Array(_len), _key = 0; _key < _len; _key++) {
		bodies[_key] = arguments[_key];
	}

	World.add(engine.world, bodies);
}

function removeBody() {
	for (var _len2 = arguments.length, bodies = Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
		bodies[_key2] = arguments[_key2];
	}

	World.remove(engine.world, bodies);
}

function addRect() {
	var _ref = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];

	var _ref$x = _ref.x;
	var x = _ref$x === undefined ? 0 : _ref$x;
	var _ref$y = _ref.y;
	var y = _ref$y === undefined ? 0 : _ref$y;
	var _ref$w = _ref.w;
	var w = _ref$w === undefined ? 10 : _ref$w;
	var _ref$h = _ref.h;
	var h = _ref$h === undefined ? 10 : _ref$h;
	var _ref$options = _ref.options;
	var options = _ref$options === undefined ? {} : _ref$options;

	var body = Bodies.rectangle(x, y, w, h, options);
	addBody(body);
	return body;
}
function addCircle() {
	var _ref2 = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];

	var _ref2$x = _ref2.x;
	var x = _ref2$x === undefined ? 0 : _ref2$x;
	var _ref2$y = _ref2.y;
	var y = _ref2$y === undefined ? 0 : _ref2$y;
	var _ref2$r = _ref2.r;
	var r = _ref2$r === undefined ? 10 : _ref2$r;
	var _ref2$options = _ref2.options;
	var options = _ref2$options === undefined ? {} : _ref2$options;

	var body = Bodies.circle(x, y, r, options);
	addBody(body);
	return body;
}

function draw() {
	background(255);

	Body.rotate(wheel, 0.015 + cos(frameCount / 30 + HALF_PI) * 0.025);

	var bodies = Composite.allBodies(engine.world);

	if (bodies.length < maximumBalls && !(frameCount % ballEveryNFrames)) {
		addCircle({
			x: 0,
			y: 0,
			r: ballRadius / 1000 * m,
			options: {
				restitution: 0.8,
				torque: random(-0.05, 0.05),
				label: 'ball'
			}
		});
	}

	translate(width / 2, height / 2);

	bodies.forEach(function (n, i) {
		var render = n.render;
		if (!render.visible) {
			return;
		}
		fill(render.fillStyle);
		stroke(render.strokeStyle);
		strokeWeight(render.lineWidth);
		if (['peg', 'ball'].includes(n.label)) {
			ellipse(n.position.x, n.position.y, n.circleRadius * 2);
		} else {
			beginShape();
			n.vertices.forEach(function (_ref3) {
				var x = _ref3.x;
				var y = _ref3.y;
				var isInternal = _ref3.isInternal;
				return vertex(x, y);
			});
			endShape(CLOSE);
		}

		if (!n.isStatic && n.position.y > height * 2) {
			removeBody(n);
		}
	});
}

function windowResized() {
	resizeCanvas(windowWidth, windowHeight);
}