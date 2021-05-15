// DOMS
let id;
let sel;
let set;
let btn;
let start = false;
let inhabitant;
let setting;
let font;
let purple = '#6959CC';
let song;
let songStartingTime = 10;
let countdownSound;

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

// keyboard
let keys = [0, 0, 0];


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
let congratsPressFrequency = 100;
let congratsBeginRotation = false;
let congratsSpin = false;
let startMillis = 0;
let contgratsSpinSpeed = 7;

// fireworks animation
let fireworks = [];
let gravity;
let vel0;
let lowest = -7;
let highest = -15; 
let gravityValue = 0.2;
let frequency = 0.03;
let particleSpread = 40;
let fireworkInterval;
let startFireworks = true;
let fireworkPressFrequency = 100;

let phase = 1;

function preload() {
    font = loadFont('/assets/fonts/freestyle-script-regular.ttf');
    song = document.getElementById('audio');
    countdownSound = document.getElementById('audio_count');
    id= select('#inhabitants');
    sel = select('#inhabitant'+id.value());

    set = select('#settings');
    btn = select('#button');
    aud = select('#audioOn');
    song.currentTime = songStartingTime;
}

function setup() {

    let cnv = createCanvas(windowWidth*0.95, windowHeight*0.80);
    let x = (windowWidth - width) / 2;
    let y = (windowHeight - height) / 2 + 55;
    cnv.position(x, y);

    btn.mousePressed(() => {
        if(!(set.value() === 'controller' && !connected)) {
            sel = select('#inhabitant'+id.value());
            inhabitant = sel.value();
            setting = set.value();
            start = true;
        }
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
            song.play();
            phase++;
            break;
        }
        case 4: {
            // potAudio();
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

// keyboard
function keyPressed() {
    if(keyCode === LEFT_ARROW) {
        keys[0] = 1;
    } else if(keyCode === RIGHT_ARROW) {
        keys[2] = 1;
    } else if(keyCode === UP_ARROW || keyCode === DOWN_ARROW) {
        keys[1] = 1; 
    }
}

function keyReleased() {
    if(keyCode === LEFT_ARROW) {
        keys[0] = 0;
    } else if(keyCode === RIGHT_ARROW) {
        keys[2] = 0;
    } else if(keyCode === UP_ARROW || keyCode === DOWN_ARROW) {
        keys[1] = 0; 
    }
}

function startingAnimation() {
    textSize(64);
    stroke(purple);
    fill(purple);
    sel = select('#inhabitant'+id.value());
    text(`inhabitant: ${sel.value()}`, width/2, height/3 - 100);
    text(`setting: ${set.value()}`, width/2, height/3);

    if(set.value() === 'controller') {
        if(connected) {
            stroke(0, 255, 0);
            fill(0, 255, 0);
            text(`controller status: success!`, width/2, height/3 + 100);
        } else {
            if(connectionFailed) {
                stroke(255, 0, 0);
                fill(255, 0, 0);
                text(`controller status: connection failed`, width/2, height/3 + 100); 
                text(`please reset controller & refresh page`, width/2, height/3 + 200);   
            } else {
                stroke(255, 255, 0);
                fill(255, 255, 0);
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

    if(timerTimeIncrement === 1000) {
        countdownSound.play();
    }

    if (timerTime < 1) {
        clearInterval(timerInterval);
        countdownSound.volume = 0;
        timerTime = 1;
        stopTimer = true;
    }

    text(timerTime, width/2, height/2 - 100);
}

function potAudio() {
    if(setting === 'controller') {
        song.volume = map(knob, 0, 1024, 0, 1);
    }
}

function congratsAnimation() {

    if(startCongrats) {
        congratsInterval = setInterval(() => {
            congratsTimeIncrement += 10;
        }, 10);

        switch(setting) {
            case 'automatic': {
                congratsColorInterval = setInterval(() => {
                    congratsColor = random(255) | 0;
                }, 300);
                break;
            }
            case 'controller': {
                congratsColor = random(255) | 0;
                congratsColorInterval = setInterval(() => {
                    if(buttons[2] === 1) {
                        congratsColor = random(255) | 0;
                    }
                }, congratsPressFrequency);
                break;
            }
            case 'keyboard': {
                congratsColor = random(255) | 0;
                congratsColorInterval = setInterval(() => {
                    if(keys[0] === 1) {
                        congratsColor = random(255) | 0;
                    }
                }, congratsPressFrequency);
                break;
            }
        }
        startCongrats = false;
    }
    if(congratsTimeIncrement >= congratsTimingLimit) {
        clearInterval(congratsInterval);
        congratsTimeIncrement = congratsTimingLimit;
        congratsBeginRotation = true;
    }

    if(congratsBeginRotation) {
        switch(setting) {
            case 'controller': {
                if (buttons[0] === 1 && !congratsSpin) {
                    startMillis = millis();
                    congratsSpin = true;
                }
                break;
            }
            case 'keyboard': {
                if (keys[2] === 1 && !congratsSpin) {
                    startMillis = millis();
                    congratsSpin = true;
                }
                break;
            }
        }
    }

    push();
    textSize(map(congratsTimeIncrement, 0, congratsTimingLimit, 0, congratsSize));
    stroke(purple);
    fill(color(`hsb(${congratsColor}, 100%, 100%)`));
    translate(width/2, height/2);

    if(congratsSpin) {
        rotate(radians((millis() - startMillis)/contgratsSpinSpeed));
        if ((startMillis + (360*contgratsSpinSpeed)) <= millis()) {
            congratsSpin = false;
        }
    } else {
        rotate(radians(0));
    }

    text(`Congratulations\n${inhabitant}!`, 0, 0);
    pop();
}

function fireworkAnimation() {
    
    switch(setting) {
        case 'automatic': {
            if(random(1) < frequency) { 
                fireworks.push(new Firework(
                    vel0 = random(highest, lowest)
                ));
            }
            break;
        }
        case 'controller': {
            if(startFireworks) {
                fireworkInterval = setInterval(() => {
                    if(buttons[1] === 1) {
                        fireworks.push(new Firework(
                            vel0 = random(highest, lowest)
                        ));
                    }
                }, fireworkPressFrequency);
            }
            startFireworks = false;
            break;
        }
        case 'keyboard': {
            if(startFireworks) {
                fireworkInterval = setInterval(() => {
                    if(keys[1] === 1) {
                        fireworks.push(new Firework(
                            vel0 = random(highest, lowest)
                        ));
                    }
                }, fireworkPressFrequency);
            }
            startFireworks = false;
            break;
        }
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


