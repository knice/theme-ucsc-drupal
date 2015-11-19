var pkg         = require('./package.json'),
    gulp        = require('gulp'),
    autoprefix  = require('gulp-autoprefixer'),
    bump        = require('gulp-bump'),
    changed     = require('gulp-changed'),
    del         = require('del'),
    concat      = require('gulp-concat'),
    imagemin    = require('gulp-imagemin'),
    livereload  = require('gulp-livereload'),
    markdown    = require('gulp-markdown'),
    minifycss   = require('gulp-minify-css'),
    rename      = require('gulp-rename'),
    sass        = require('gulp-ruby-sass'),
    svgo        = require('imagemin-svgo'),
    server      = require('tiny-lr')(),
    zip         = require('gulp-zip');

//
// Set default file path variables for tasks
//
var paths = {
    styles: ['./sass/*.scss', './sass/**/**.**'],
    images: './images/**/**'
};


//
// Clean the build folder so we start clean
//
gulp.task('clean', function(cb) {
    del([
        './css/**/*',
        './build/**/*'
        ], cb);
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
        .pipe(gulp.dest('./css/'))
        .pipe(livereload(server));
});


//
// Implement later: Optimize and copy images into the build folder.
//
// gulp.task('images', function() {
//     return gulp.src(paths.images)
//         .pipe(changed('./images/'))
//         .pipe(imagemin({
//             optimizationLevel: 5
//         }))
//         .pipe(gulp.dest('./src/images/'));
// });


//
// Implement later: Optimize svg and make sprites in the build folder.
//
// gulp.task('svg', function() {
//     return gulp.src(paths.svg)
//         .pipe(svgo()())
//         .pipe(imacss('_svg.scss', 'icon'))
//         .pipe(gulp.dest('./app/src/sass/base'));
// });

gulp.task('readme', function () {
    return gulp.src('./README.md')
        .pipe(markdown())
        .pipe(rename('index.html'))
        .pipe(gulp.dest('./build/'));
});

//
// Defined method of updating:
//
gulp.task('bump', function(){
  gulp.src('./package.json')
  .pipe(bump({type:'minor'}))
  .pipe(gulp.dest('./'));
});


//
// Create zip archive of static file assets
//
gulp.task('build', ['clean', 'styles', 'readme'], function() {
    return gulp.src([
            './css/**.**',
            './images/**/**.**',
            './partials/**',
            './base64.js',
            './*.php',
            './*.png',
            './*.info',
            './*.md'
        ], {
            base: "./"
        })
        .pipe(gulp.dest('./build/ucscv3'));
});


//
// The default task (called when you run `gulp`)
//
gulp.task('default', ['clean','styles'], function () {
    gulp.watch('sass/**/*.scss', ['styles']);
    // gulp.watch('app/src/images/**/.**', ['images']);
    livereload.listen(35729, function(err) {
      host: '192.168.44.44';
      if (err) {
        return gutil.log(err);
      }
    });

    // livereload.listen(35729, function(err){
    //     host: '192.168.44.44'
    // });
});


//
// The fresh task: compiles everything so we can zip it up with 'gulp build'.
//
gulp.task('fresh', ['clean', 'styles']);
