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
var game = new Phaser.Game(mapWidth, mapHeight, Phaser.AUTO, "content", {preload:preload, create:create, update:update, render:render});
game.transparent = false;
function preload() {
    //découpe sprite en 84 image par la taile WIDTH et HEIGHT
    game.load.spritesheet('personnage', "js/sprite/Perso.png", WIDTH, HEIGHT, 84);
    //charge le fichier JSON de la map
    game.load.tilemap('background', 'js/classes/json/background.json', null, Phaser.Tilemap.TILED_JSON);
    // charge l'image des tuiles
    game.load.image('tiles', 'js/tileset/tileset.png');
}
function create() {
    game.physics.startSystem(Phaser.Physics.P2JS);
    back = new Background(game);
    perso = new Perso(game);
    cursors = game.input.keyboard.createCursorKeys();
}
function update() {
    perso.finDeplacement();
   //console.log(game.physics.arcade.collide(perso, layer4));
    if(cursors.left.isDown) {
        perso.deplacementGauche();
        console.log(perso.image.body);
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
function render() {

}