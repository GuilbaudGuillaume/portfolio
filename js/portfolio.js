var HEIGHT = 32;
var WIDTH = 32;
var mapWidth = WIDTH * 30;
var mapHeight = HEIGHT * 20;
var gameState = {};
var back = {};
var perso ={};
var map;
var layer;
var layer2;
var layer3;
var layer4;
var deplacementPerso = 200;
var playerGauche;
var cursors;
gameState.load = function() { };
gameState.main = function() { };
var game = new Phaser.Game(mapWidth, mapHeight, Phaser.AUTO, "content", {preload:preload, create:create, update:update});
game.transparent = false;
function preload() {
    game.load.spritesheet('personnage', "js/sprite/Perso.png", WIDTH, HEIGHT, 84);
    //découpe sprite en 84 image
    game.load.tilemap('background', 'js/classes/json/background.json', null, Phaser.Tilemap.TILED_JSON);
    game.load.image('tiles', 'js/tileset/tileset.png');
    game.load.physics('data', "js/classes/json/background.json");
}
function create() {
    back = new Background(game);
    perso = new Perso(game);
    back.geActive();
    cursors = game.input.keyboard.createCursorKeys();
}
function update() {
    perso.finDeplacement();
    //game.physics.arcade.collide(perso, layer3);
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