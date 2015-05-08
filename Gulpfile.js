var pkg = require('./package.json'),
    gulp = require('gulp'),
    changed = require('gulp-changed'),
    autoprefix = require('gulp-autoprefixer'),
    sass = require('gulp-ruby-sass'),
    concat = require('gulp-concat'),
    minifycss = require('gulp-minify-css'),
    clean = require('gulp-clean'),    
    rename = require('gulp-rename'),    
    imagemin = require('gulp-imagemin'),    
    zip = require('gulp-zip'),
    bump = require('gulp-bump'),
    markdown = require('gulp-markdown'),
    svgo = require('imagemin-svgo');
var s3 = require('gulp-s3-upload')({
        accessKeyId: process.env.S3_ACCESS_KEY_ID,
        secretAccessKey: process.env.S3_SECRET_KEY
    });    

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
gulp.task('clean', function() {
    gulp.src([
        './css/**',
        './build/**'
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
// Implement later: Create zip archive of static file assets
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
            base: "./ucsc"
        })
        .pipe(zip('ucsc.zip'))
        .pipe(gulp.dest('./build'));
});



gulp.task('upload', ['build'], function() {
    gulp.src("./build/**")
        .pipe(s3({
            Bucket: process.env.S3_UCSC_DRUPAL, //  Required 
            ACL:    'public-read' //  Needs to be user-defined 
        }));
});



//
// The default task (called when you run `gulp`)
//
gulp.task('default', ['styles'], function () {
    gulp.watch('sass/**/*.scss', ['styles']);
    // gulp.watch('app/src/images/**/.**', ['images']);
});


//
// The fresh task: compiles everything so we can zip it up with 'gulp build'.
//
gulp.task('fresh', ['clean', 'styles']);


//
// Cleans the CSS and build directories, runs the styles and build tasks,
// then uploads the zipped theme to S3.
//
gulp.task('deploy', ['build', 'upload']);