let fireworks = [];
let gravity;

function setup() {
    createCanvas(400, 300);
    gravity = createVector(0, 0.2);
    stroke(255);
    strokeWeight(4);
    background(0);
}

function draw() {
    background(0, 25);
    if(random(1) < 0.1) {
        fireworks.push(new Firework());
    }
    for(let i = fireworks.length-1; i >= 0; i--) {
        fireworks[i].update();
        fireworks[i].show();
        if (fireworks[i].done()) {
            fireworks.splice(i, 1);
        }
    }
}