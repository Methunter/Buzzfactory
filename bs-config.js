/**
 * Require Browsersync
 */
var browserSync = require('browser-sync');

/**
 * Run Browsersync with server config
 */
// browserSync({
//     server: "app",
//     files: ["./*.html", "./css/*.css", "./js/*.js", "./app/*.js"],
//     // host: "http://bscms.com"
// });
browserSync.init({
    proxy: {
        target: "cms.com",
    },
    serveStatic: ["*.html", "css/*.css", "js/*.js", "app/*.js"],
    files: "",
    // snippetOptions: {
    //     rule: {
    //         match: /<\/head>/i,
    //         fn: function (snippet, match) {
    //             return '<link rel="stylesheet" type="text/css" href="/_custom.css"/>' + snippet + match;
    //         }
    //     }
    // }
});