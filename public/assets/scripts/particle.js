function Particle(x, y, hu, explosion) {

    this.pos = createVector(x, y);
    this.explosion = explosion;
    this.lifespan = 100;
    this.hu = hu;

    if(!this.explosion) {
        this.vel = createVector(0, random(-11, -8));
    } else {
        this.vel = p5.Vector.random2D();
        this.vel.mult(random(2, 10));
    }
        this.acc = createVector(0, 0);

    this.update = () => {
        if(this.explosion) {
            this.vel.mult(0.9);
            this.lifespan -= 1.5;
        }
        this.vel.add(this.acc);
        this.pos.add(this.vel);
        this.acc.mult(0);
    }

    this.show = () => {
        if(this.explosion) {
            strokeWeight(2);
            stroke(color(`hsb(${this.hu}, 100%, ${this.lifespan}%)`));
        } else {
            strokeWeight(4);
            stroke(color(`hsb(${this.hu}, 100%, 100%)`));
        }
        point(this.pos.x, this.pos.y);
    }

    this.applyForce = (force) => {
        this.acc.add(force);
    }

    this.done = () => {
       return this.lifespan < 0;
    }
}
