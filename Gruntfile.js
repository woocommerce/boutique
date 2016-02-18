/* jshint node:true */
module.exports = function( grunt ) {
	'use strict';

	grunt.initConfig({
		// Compile all .scss files.
		sass: {
			dist: {
				options: {
					require: 'susy',
					sourcemap: 'none',
					includePaths: ['node_modules/susy/sass'].concat( require( 'node-bourbon' ).includePaths )
				},
				files: [{
					'style.css': 'style.scss'
				}]
			}
		},

		// Watch changes for assets.
		watch: {
			css: {
				files: [
					'style.scss'
				],
				tasks: [
					'sass'
				]
			}
		},

		// RTLCSS
		rtlcss: {
			options: {
				config: {
					swapLeftRightInUrl: false,
					swapLtrRtlInUrl: false,
					autoRename: false,
					preserveDirectives: true
				}
			},
			main: {
				expand: true,
				ext: '-rtl.css',
				src: [
					'style.css'
				]
			}
		}
	});

	// Load NPM tasks to be used here
	grunt.loadNpmTasks( 'grunt-sass' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-rtlcss' );

	// Register tasks
	grunt.registerTask( 'default', [
		'css',
	]);

	grunt.registerTask( 'css', [
		'sass',
		'rtlcss'
	] );
};