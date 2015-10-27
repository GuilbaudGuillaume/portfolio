var Background = my.Class ({
	constructor : function(game) {
		this.game = game;
		this.game.world.setBounds(0, 0, WIDTH * 50, HEIGHT * 50);
		map = this.game.add.tilemap('background');
		map.addTilesetImage('sol', "tiles");
		layer = map.createLayer('tuile');
		layer.resizeWorld();
		layer2 = map.createLayer('carte');
		layer2.resizeWorld();
		layer3 = map.createLayer('objetSol');
		layer3.resizeWorld();
		layer4 = map.createLayer('colision');
		this.game.physics.startSystem(Phaser.Physics.P2JS);
		this.game.physics.p2.convertTilemap(map, layer4);
		this.game.physics.p2.setBoundsToWorld(true, true, true, true, false);
		
		//this.game.load.image('tiles', 'js/tileset/tileset.png');
		//this.game.load.image('tile', 'js/tileset/tilset2.png');
		//this.image = game.add.tileSprite(0, 0, mapHeight, mapWidth, 'background', 15);
	},
	geActive : function() {
		map.setCollisionBetween(901);
	}
});