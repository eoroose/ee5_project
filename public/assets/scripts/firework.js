function Firework() {

    this.hu = random(255) | 0;
    this.firework = new Particle(random(width), height, this.hu,  false);
    this.exploded = false;
    this.particles = [];
    this.explosionParticles = 100;

    this.update = () => {
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

    this.show = () => {
        if(!this.exploded) {
            this.firework.show();
        }
        for(let i = this.particles.length-1; i >= 0; i--) {
            this.particles[i].show();
        }
    }

    this.explode = () => {
        for(let i = 0; i < this.explosionParticles; i++) {
            let p = new Particle(this.firework.pos.x, this.firework.pos.y, this.hu, true);
            this.particles.push(p);
        }
    }

    this.done = () => {
        return this.exploded && this.particles.length === 0;
    }
}