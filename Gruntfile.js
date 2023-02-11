/* eslint-env node, es6 */
module.exports = function ( grunt ) {
	var conf = grunt.file.readJSON( 'extension.json' );

	grunt.loadNpmTasks( 'grunt-banana-checker' );
	grunt.loadNpmTasks( 'grunt-eslint' );
	grunt.loadNpmTasks( 'grunt-stylelint' );

	grunt.initConfig( {
		banana: conf.MessagesDirs,
		eslint: {
			options: {
				extensions: [ '.js', '.json' ],
				cache: true
			},
			all: [
				'**/*.{js,json}',
				'!node_modules/**',
				'!vendor/**',
				'!resources/ext.biblioPlus.qtip/ext.biblioPlus.qtip.min.js'
			]
		},
		stylelint: {
			all: [
				'**/*.{css,less}',
				'!node_modules/**',
				'!vendor/**',
				'!resources/ext.biblioPlus.qtip/ext.biblioPlus.qtip.min.css'
			]
		}
	} );

	grunt.registerTask( 'test', [ 'eslint', 'banana', 'stylelint' ] );
	grunt.registerTask( 'default', 'test' );
};
