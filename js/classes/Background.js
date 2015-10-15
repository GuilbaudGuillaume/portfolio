var Background = my.Class ({
	constructor : function(game) {
		this.game = game;
		this.image = game.add.tileSprite(0, 0, mapHeight, mapWidth, 'background', 4);
	}
});