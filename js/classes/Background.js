var Background = my.Class ({
	constructor : function(game) {
		this.game = game;
		this.game.world.setBounds(0, 0, WIDTH * 50, HEIGHT * 50);
		map = this.game.add.tilemap('background');
		map.addTilesetImage('sol', "tiles");
		map.addTilesetImage("tileObjet", 'tileObjet');
		layer4 = map.createLayer('colision');
		layer4.resizeWorld();
		layer = map.createLayer('tuile');
		layer.resizeWorld();
		layer2 = map.createLayer('carte');
		layer2.resizeWorld();
		layer3 = map.createLayer('objetSol');
		layer3.resizeWorld();
		layerObjet = map.createLayer('objet');
		layerObjet.resizeWorld;
		//indique l'index des cases pour la colision
		map.setCollisionBetween(1,2);
		//définit le layer de collision
		this.game.physics.p2.convertTilemap(map, layer4);
		//this.game.add.existing(layer4);
	}
});