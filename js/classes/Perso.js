var Perso = my.Class ({
    constructor : function(game) {
        this.game = game;
        this.image = game.add.sprite(80, 80, "personnage");
        this.image.width = WIDTH;
        this.image.height = HEIGHT;
        this.image.anchor.setTo(0.5, 0.5);

        this.image.animations.add('gauche', [12, 13, 14], 10, true);
        this.image.animations.add('droite', [24, 25, 26], 10, true);
        this.image.animations.add('haut', [36, 37, 38], 10, true);
        this.image.animations.add('bas', [0, 1, 2], 10, true);
        this.game.physics.p2.enable(this.image);
        this.image.body.collideWorldBounds = true;
        this.game.camera.follow(this.image);
        this.image.body.fixedRotation = true;
    },
    deplacementGauche : function() {
        this.image.play('gauche');
        this.image.body.moveLeft(deplacementPerso);
    },
    deplacementDroite : function() {
        this.image.play('droite');
        this.image.body.moveRight(deplacementPerso);
    },
    deplacementBas : function() {
        this.image.play('bas');
        this.image.body.moveDown(deplacementPerso);
    },
    deplacementHaut : function() {
        this.image.play('haut');
        this.image.body.moveUp(deplacementPerso);
    },
    animationStop : function() {
        this.image.animations.stop();
    },
    finDeplacement : function () {
        this.image.body.setZeroVelocity();
    }
});