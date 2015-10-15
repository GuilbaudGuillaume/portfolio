var MoteurPhysique = my_Class ({
	constructor : function(game) {
		this.game = game;
		this.game.physics.startSystem(Phaser.Physics.ARCADE);
	}
});