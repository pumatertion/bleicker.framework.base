/*global module:false*/
module.exports = function(grunt) {

	grunt.initConfig({
		// Metadata.
		pkg: grunt.file.readJSON('package.json'),
		banner: '/*! <%= pkg.title || pkg.name %> v<%= pkg.version %> ' +
			'<%= pkg.homepage ? "(" + pkg.homepage + ")\\n" : "" %>' +
			' * Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %> <<%= pkg.author.email %>> (<%= pkg.author.url %>) \n' +
			' */\n',

		sass: {
			development: {
				options: {
					style: 'compressed',
					sourcemap: 'none'
				},
				files: {
					"Public/Styles/Site.css": "Private/Styles/Site.scss"
				}
			}
		},

		watch: {
			sass_files_changed: {
				files: [
					"Private/Styles/*"
				],
				tasks: ['sass'],
				options: {
					event: ['changed']
				}
			},
			sass_files_added_deleted: {
				files: [
					"Private/Styles/*"
				],
				tasks: ['sass'],
				options: {
					event: ['added', 'deleted'],
					interrupt: false
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-prettify');
	grunt.loadNpmTasks('grunt-notify');

	// Default task.
	grunt.registerTask('default', ['build']);

	// Build task.
	grunt.registerTask('build', ['sass']);
};
