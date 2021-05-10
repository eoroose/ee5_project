// DOMS
let sel;
let set;
let btn;
let start = false;
let inhabitant;
let setting;
let font;
let purple = '#6959CC';

// controller
let startConnection = true;
let startGettingData = true;
const url_init = 'http://192.168.1.105/';
const url_data = 'http://192.168.1.105/get_data';
let buttons = [0, 0, 0];
let knob = 0;
let controllerInitInterval;
let controllerGetDataInterval;
let connected = false;
let connectionFailed = false;


// timer
let startTimer = true;
let stopTimer = false;
let timerTime = 5;
let timerTimeIncrement = 1000;
let timerInterval;
let timerSize = 500;

// congrats text
let startCongrats = true;
let congratsSize = 200;
let congratsInterval;
let congratsColorInterval;
let congratsTimeIncrement = 0;
let congratsTimingLimit = 500;
let congratsColor;

// fireworks animation
let fireworks = [];
let gravity;
let vel0;
let lowest = -7;
let highest = -15; 
let gravityValue = 0.2;
let frequency = 0.03;
let particleSpread = 40;

let phase = 1;

function preload() {
    font = loadFont('/assets/fonts/freestyle-script-regular.ttf');
    sel = select('#inhabitants');
    set = select('#settings');
    btn = select('#button');
}

function setup() {

    let cnv = createCanvas(windowWidth*0.95, windowHeight*0.80);
    let x = (windowWidth - width) / 2;
    let y = (windowHeight - height) / 2 + 55;
    cnv.position(x, y);

    btn.mousePressed(() => {
        inhabitant = sel.value();
        setting = set.value();
        start = true;
    });

    gravity = createVector(0, gravityValue);
    textFont(font);
    textAlign(CENTER, CENTER);
}

function draw() {
    background(0, 25);

    switch(phase) {

        case 1: {
            startingAnimation();
            phase += start ? 1 : 0;
            break;
        }
        case 2: {
            
            timerAnimation();
            phase += stopTimer ? 1 : 0;
            break;
        }

        case 3: {
            if(setting === 'controller' && connected && startGettingData) {
                controllerGetDataInterval = setInterval(getControllerData, 100);
                startGettingData = false;
            }
            phase++;
            break;
        }
        
        case 4: {
            fireworkAnimation();
            congratsAnimation();
            break;
        }
    }  
}

// controller intevals
async function initController() {
    console.log('connecting...');
    try {
        let response = await fetch(url_init);
        if(!response.ok) {
            throw new Error(response.statusText);
        }
        let data = await response.json();
        console.log(data);   
        if(data['connectedToClient'] === false) {

            console.log('begining data collection');
            connected = true;

            clearInterval(controllerInitInterval);
        } else if(data['connectedToClient'] === true) {

            console.log('please reset controller and refresh page');
            connectionFailed = true;
            clearInterval(controllerInitInterval);
        }
    } catch (err) {
        console.log(err);
    }
}

async function getControllerData() {
    try {
        let response = await fetch(url_data);
        if(!response.ok) {
            throw new Error(response.statusText);
        }
        let data = await response.json();
        buttons[0] = data['button1'];
        buttons[1] = data['button2'];
        buttons[2] = data['button3'];
        knob = data['knob'];
    } catch (err) {
        console.log(err);
    }
    console.log(buttons, knob);
}

function startingAnimation() {
    textSize(64);
    stroke(purple);
    fill(purple);
    
    text(`inhabitant: ${sel.value()}`, width/2, height/3 - 100);
    text(`setting: ${set.value()}`, width/2, height/3);

    if(set.value() === 'controller') {
        if(connected) {
            text(`controller status: success!`, width/2, height/3 + 100);
        } else {
            if(connectionFailed) {
                text(`controller status: connection failed`, width/2, height/3 + 100); 
                text(`please reset controller & refresh page`, width/2, height/3 + 200);   
            } else {
                text(`controller status: connecting...`, width/2, height/3 + 100);
            }
        }
        if(startConnection) {
            controllerInitInterval = setInterval(initController, 3000);
            startConnection = false;
        }

    } else if(set.value() === 'keyboard') {
        text(`(arrow keys)`, width/2, height/3 + 100);
    }
}




function timerAnimation() { 
    textSize(map(timerTimeIncrement, 0, 1000, 0, timerSize));
    stroke(purple);
    fill(purple);

    if(startTimer) {
        timerInterval = setInterval(() => {
            timerTimeIncrement -= 10;
        }, 10);
        startTimer = false;
    }

    if(timerTimeIncrement <= 0) {
        timerTimeIncrement = 1000;
        timerTime--;
    }

    if (timerTime < 0) {
        clearInterval(timerInterval);
        timerTime = 0;
        stopTimer = true;
    }

    text(timerTime, width/2, height/2 - 100);
}

function congratsAnimation() {

    if(startCongrats) {
        congratsInterval = setInterval(() => {
            congratsTimeIncrement += 10;
        }, 10);
        congratsColorInterval = setInterval(() => {
            congratsColor = random(255) | 0;
        }, 500);
        startCongrats = false;
    }
    if(congratsTimeIncrement >= congratsTimingLimit) {
        clearInterval(congratsInterval);
        congratsTimeIncrement = congratsTimingLimit;
    }

    textSize(map(congratsTimeIncrement, 0, congratsTimingLimit, 0, congratsSize));
    stroke(purple);
    fill(color(`hsb(${congratsColor}, 100%, 100%)`));
    text(`Congratulations`, width/2, height/3 - 100);
    text(`${inhabitant}!`, width/2, height/3 + 100);
}

function fireworkAnimation() {
    
    if(random(1) < frequency) { 
        fireworks.push(new Firework(
            vel0 = random(highest, lowest)
        ));
    }

    for(let i = fireworks.length-1; i >= 0; i--) {
        fireworks[i].update();
        fireworks[i].show();
        if(fireworks[i].done()) {
            fireworks.splice(i, 1);
        }
    }
}

// fireworks

class Firework {
    constructor(vel0) {
        this.hu = random(200) | 0;
        this.exploded = false;
        this.particles = [];
        this.firework = new FireworkParticle(
            random(width), height, vel0, this.exploded, this.hu
        );
    }

    explode() {
        for(let i = 100; i > 0; i--) {
            this.particles.push(new FireworkParticle(
                this.firework.pos.x, this.firework.pos.y, 0, this.exploded, this.hu
            ));
        }
    }

    done() {
        return this.exploded && this.particles.length === 0;
    }

    update() {
        if(!this.exploded) {
            this.firework.applyForce(gravity);
            this.firework.update();

            if(this.firework.vel.y >= 0) {
                this.exploded = true;
                this.explode();
            }
        }

        for(let i = this.particles.length-1; i >= 0; i--) {
            this.particles[i].applyForce(gravity);
            this.particles[i].update();
            if(this.particles[i].done()) {
                this.particles.splice(i, 1);
            }
        }

    }

    show() {
        if(!this.exploded) {
            this.firework.show();
        }

        for(let i = this.particles.length-1; i >= 0; i--) {
            this.particles[i].show();
        }
    }
}


class FireworkParticle {
    constructor(x, y, initVel, exploded, hu) {
        this.exploded = exploded;
        this.pos = createVector(x, y);

        if(!this.exploded) {
            this.vel = createVector(0, initVel);
        } else {
            this.vel = p5.Vector.random2D();
            this.vel.mult(random(5, particleSpread));
        }
        
        this.acc = createVector(0, 0);
        this.lifespan = 255;
        this.lifespanCounter = 3.5;
        this.hu = hu;
    }

    applyForce(force) {
        this.acc.add(force);
    }

    done() {
        return this.lifespan < 0;
    }

    update() {
        if(this.exploded) {
            this.vel.mult(0.85);
            this.lifespan -= this.lifespanCounter;
        }
        this.vel.add(this.acc);
        this.pos.add(this.vel);
        this.acc.mult(0);
    }

    show() {
        strokeWeight(this.exploded ? 2 : 3);
        stroke(color(`hsb(${this.hu}, 100%, ${this.lifespan}%)`));
        point(this.pos.x, this.pos.y);
    }
}


