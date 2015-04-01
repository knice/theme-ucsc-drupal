var pkg = require('./package.json'),
    gulp = require('gulp'),
    changed = require('gulp-changed'),
    autoprefix = require('gulp-autoprefixer'),
    sass = require('gulp-ruby-sass'),
    concat = require('gulp-concat'),
    minifycss = require('gulp-minify-css'),
    clean = require('gulp-clean'),    
    imagemin = require('gulp-imagemin'),    
    zip = require('gulp-zip'),
    svgo = require('imagemin-svgo'),    
    browserSync = require('browser-sync');

//
// Set default file path variables for tasks
//
var paths = {
    styles: ['./sass/*.scss', './sass/**/**.**'],
    images: './images/**/**'
};

//
// Static webserver with livereload via connect
//
gulp.task('webserver', function() {
    browserSync.init("./index.php", {
        server: {
            baseDir: "./"            
        },
        watchOptions: {
            debounceDelay: 3000
        }
    });
});

//
// Clean the build folder so we start clean
//
gulp.task('clean', function() {
    gulp.src([
        'css'
        ], {
        read: false
    })
    .pipe(clean());
});


//
// Compile sass into CSS without source map.
//
gulp.task('styles', function() {
    return gulp.src(paths.styles)
        .pipe(changed('./css/'))
        .pipe(sass({
            sourcemap: false,
            sourcemapPath: '.',
            require: ['bourbon', 'neat']
        }))
        .pipe(autoprefix('last 4 versions'))
        .pipe(minifycss())
        .pipe(gulp.dest('./css/'));
});


//
// Optimize and copy images into the build folder.
//
// gulp.task('images', function() {
//     return gulp.src(paths.images)
//         .pipe(changed('./app/src/jekyll/images/'))
//         .pipe(imagemin({
//             optimizationLevel: 5
//         }))
//         .pipe(gulp.dest('./app/src/jekyll/images/'));
// });


//
// Optimize svg and make sprites in the build folder.
//
// gulp.task('svg', function() {
//     return gulp.src(paths.svg)
//         .pipe(svgo()())
//         .pipe(imacss('_svg.scss', 'icon'))
//         .pipe(gulp.dest('./app/src/sass/base'));
// });


//
// Create zip archive of static file assets
//
gulp.task('build', function() {
    return gulp.src([
            './app/src/jekyll/css/**.**',
            './app/src/jekyll/images/**/**.**',
            './app/src/jekyll/js/**.**',
            './app/src/jekyll/lib/**/**.**'
        ], {
            base: "./app/src/jekyll"
        })
        .pipe(zip('_responsive.zip'))
        .pipe(gulp.dest('./static'));
});


//
// The default task (called when you run `gulp`)
//
gulp.task('default', ['styles'], function () {
    gulp.watch('sass/**/*.scss', ['styles']);
    // gulp.watch('app/src/images/**/.**', ['images']);
});


//
// The fresh task: compiles everything so we can zip it up for Cascade with 'gulp build'.
//
gulp.task('fresh', ['clean', 'bower-files', 'styles', 'scripts', 'images']);



