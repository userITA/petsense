/* jshint node:true */
module.exports = function( grunt ){
	'use strict';

	grunt.initConfig({
		// setting folder templates
		dirs: {
			css: '/var/www/html/Assets/css',
			less: '/var/www/Less',
			js: '/var/www/html/Assets/js',
            twig: '/var/www/App/Templates',
			src: '/var/www/html/Assets',
			//dest: '/home/webtecne/public_html/oms/Assets'
		},

		// Compile all .less files.
		less: {
			compile: {
				options: {
					// These paths are searched for @imports
					paths: ['<%= dirs.less %>'],
					sourceMap: true,
					sourceMapFilename: "<%= dirs.css %>/style.css.map"
				},
				files: [{
					expand: true,
					cwd: '<%= dirs.less %>/',
					src: [
						'*.less',
						'!mixins.less'
					],
					dest: '<%= dirs.css %>/',
					ext: '.css'
				}]
			}
		},

		// Minify all .css files.
		cssmin: {
			minify: {
				expand: true,
				cwd: '<%= dirs.css %>/',
				src: ['*.css'],
				dest: '<%= dirs.css %>/',
				ext: '.css'
			}/*,
			leaflet: {
				files: {
					// Minifica Leaflet CSS
					'/var/www/html/Assets/vendor/css/leaflet.min.css': ['node_modules/leaflet/dist/leaflet.css']
				}
			}*/
		},

		// Minify .js files.
		uglify: {
			options: {
				preserveComments: 'some',
				sourceMap: true
			},
			jsfiles: {
				files: [{
					expand: true,
					cwd: '<%= dirs.js %>/',
					src: [
						'*.js',
						'!*.min.js',
						'!Gruntfile.js',
					],
					dest: '<%= dirs.js %>/',
					ext: '.min.js'
				}]
			}/*,
			leaflet: {
				files: {
					// Minifica Leaflet JS
					'/var/www/html/Assets/vendor/js/leaflet.min.js': ['node_modules/leaflet/dist/leaflet.js']
				}
			}*/
		},

		// Watch changes for assets
		watch: {
			less: {
				files: [
					'<%= dirs.less %>/*.less',
				],
				tasks: ['less', 'cssmin'],
			},
			js: {
				files: [
					'<%= dirs.js %>/*js',
					'!<%= dirs.js %>/*.min.js'
				],
				tasks: ['uglify']
			}
		},


        //Bootlint
        //bootlint: {
            //options: {
                //stoponerror: false,
                //relaxerror: []
            //},
            //files: ['<%= dirs.twig %>/**/*.twig']
        //},

        //HTML
        //htmllint: {
            //all: ['<%= dirs.twig %>/**/*.twig']
        //},

		// Copy
		copy: {
			main: {
				files: [
					{expand: true, flatten: true, src: ['vendor/twbs/bootstrap/dist/css/*'], dest: 'html/Assets/css/vendors/', filter: 'isFile'},
					{expand: true, flatten: true, src: ['vendor/twbs/bootstrap/dist/js/*'], dest: 'html/Assets/js/vendors/', filter: 'isFile'},
					{expand: true, flatten: true, src: ['vendor/datatables/datatables/media/css/*'], dest: 'html/Assets/css/vendors/', filter: 'isFile'},
					{expand: true, flatten: true, src: ['vendor/datatables/datatables/media/js/*'], dest: 'html/Assets/js/vendors/', filter: 'isFile'}
				]
			}
		}
	});

	// Load NPM tasks to be used here
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-bootlint');
    grunt.loadNpmTasks('grunt-html');

	//grunt.loadNpmTasks('grunt-contrib-copy');
	//grunt.loadNpmTasks('grunt-sftp-deploy');

	// Register tasks
	grunt.registerTask( 'default', [
		'less',
		'cssmin',
		//'uglify' 
        //'bootlint',
        //'htmllint'
	]);
};
