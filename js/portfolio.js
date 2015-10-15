var HEIGHT = 40;
var WIDTH = 40;
var mapWidth = WIDTH * 20;
var mapHeight = HEIGHT * 20;
var gameState = {};
var back = {};
var perso ={};
var deplacementPerso = 3;
var playerGauche;
var cursors;
gameState.load = function() { };
gameState.main = function() { };
var game = new Phaser.Game(mapWidth, mapHeight, Phaser.AUTO, "content", {preload:preload, create:create, update:update});
game.transparent = false;
function preload() {
    game.load.spritesheet('personnage', "js/sprite/Perso.png", 32, 32, 84);
    //découpe sprite en 84 image
    game.load.spritesheet('background', "js/tileset/tileset.png", WIDTH, HEIGHT, 15);
    game.load.spritesheet('batiment', "js/tileset/tileset2.png", WIDTH, HEIGHT, 1);
}
function create() {
    back = new Background(game);
    perso = new Perso(game);
    cursors = game.input.keyboard.createCursorKeys();
}
function update() {
    if(cursors.left.isDown) {
        perso.deplacementGauche();
    } 
    else if (cursors.right.isDown) {
        perso.deplacementDroite();
    }
    else if(cursors.up.isDown) {
        perso.deplacementHaut();
    }
    else if(cursors.down.isDown) {
        perso.deplacementBas();
    }
    else {
        perso.animationStop();
    }

}