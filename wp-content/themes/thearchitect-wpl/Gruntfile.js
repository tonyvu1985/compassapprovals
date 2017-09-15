'use strict';

module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		project: {
			app      : [''],
			src      : ['src'],
			assets   : ['assets'],
			sass     : ['<%= project.src %>/sass/style.scss'],
			font_src : ['bower_components/font-awesome/fonts/*'],
			js_src   : [
				'node_modules/flexslider/jquery.flexslider.js',
				'bower_components/jquery-hoverintent/jquery.hoverIntent.js',
				'bower_components/jquery-backstretch/src/jquery.backstretch.js',
				'bower_components/jquery.scrollTo/jquery.scrollTo.js',
				'bower_components/modernizr/modernizr.js',
				'bower_components/jquery.easing/js/jquery.easing.js',
				'bower_components/jquery.fitvids/jquery.fitvids.js',
				'bower_components/wpl-common/google-maps/google-maps.js'
			],
			vendorPHP: [
				'bower_components/wpl-common/google-maps/google-maps.php'
			]
		},

		sass: {
			dev: {
				options: {
					outputStyle: 'expanded',
					compass: false,
					sourceMap: true
				},
				files: {
					'style.css':'<%= project.sass %>',
				}
			},
			dist: {
				options: {
					outputStyle: 'compressed',
					compass: false
				},
				files: {
					'style.css':'<%= project.sass %>'
				}
			}
		},

		sync: {
			main: {
				files: [
					{
						expand: true,
						flatten: true,
						src: '<%= project.font_src %>',
						dest: '<%= project.assets %>/fonts',
					},
					{
						expand: true,
						flatten: true,
						src: '<%= project.js_src %>',
						dest: '<%= project.assets %>/javascript/vendor',
					},
				],
			},
			php: {
				files: [{
					expand: true,
					flatten: true,
					src: '<%= project.vendorPHP %>',
					dest: 'inc',
				}],
			}
		},

		pot: {
			options: {
				text_domain: 'thearchitect-wpl',
				dest: 'languages/',
				keywords: [ // WordPress i18n functions
					'__:1',
					'_e:1',
					'_x:1,2c',
					'esc_html__:1',
					'esc_html_e:1',
					'esc_html_x:1,2c',
					'esc_attr__:1',
					'esc_attr_e:1',
					'esc_attr_x:1,2c',
					'_ex:1,2c',
					'_n:1,2',
					'_nx:1,2,4c',
					'_n_noop:1,2',
					'_nx_noop:1,2,3c'
				]
			},
			files: {
				src: [ '**/*.php', '!option-tree/**/*', '!inc/plugins/class-tgm-plugin-activation.php', '!bower_components/**/*', '!node_modules/**/*' ],
				expand: true
			}
		},

		watch: {
			gruntfile: {
				files: 'Gruntfile.js',
				tasks: ['default']
			},

			sass: {
				files: '<%= project.src %>/sass/**/*.{scss,sass}',
				tasks: ['sass:dev']
			},

			sync: {
				files: ['<%= project.font_src %>', '<%= project.js_src %>'],
				tasks: ['sync:main']
			}
		}
	});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-sync');
	grunt.loadNpmTasks('grunt-pot');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('build', ['sass:dist', 'sync', 'pot']);

	grunt.registerTask('default', ['sass:dev', 'sync' ,'watch']);
};
