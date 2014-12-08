module.exports = function(grunt) {

    grunt.initConfig({
        nightwatch: {
            options: {
                standalone: true,
                src_folders: ['test'],
                desiredCapabilities: {
                    javascriptEnabled: true,
                    acceptSslCerts: true
                }
            },
            default: {
                launch_url: 'http://localhost:3000',
                desiredCapabilities: {
                    browserName: 'chrome',
                    javascriptEnabled: true,
                    acceptSslCerts: true
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-nightwatch');
};
