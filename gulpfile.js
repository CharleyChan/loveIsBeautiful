var gulp = require('gulp');
    concact = require('gulp-concat');
    minifyCSS = require('gulp-minify-css');
    uglify = require('gulp-uglify');
    rename = require('gulp-rename');
    htmlreplace = require('gulp-html-replace');
    minifyHTML  = require('gulp-minify-html');
    compass   = require('gulp-compass');
    extender = require('gulp-html-extend');
    md = require('gulp-markdown');

var webserver = require('gulp-webserver');


// gulp.task('webserver',function () {
//     gulp.src('./')
//         .pipe(webserver({
//             port: 1234,
//             livereload: true,
//             directoryListing: false,
//             open: true,
//             fallback: 'index.html'
//         }));
// });

gulp.task('concat', function() {
    return gulp.src('./app/css/*.css')
        .pipe(concact('all.css'))
        .pipe(gulp.dest('./app/build/css/'));
});


gulp.task('minify-css',['concat'], function() {
    return gulp.src('./app/build/css/all.css')
        .pipe(minifyCSS({
            keepBreaks: true,
        }))
        .pipe(rename(function(path) {
            path.basename += ".min";
            path.extname = ".css";
        }))
        .pipe(gulp.dest('./app/build/css/'));
});


gulp.task('uglify', function() {
    return gulp.src('./app/js/*.js')
        .pipe(uglify())
        .pipe(rename(function(path) {
            path.basename += ".min";
            path.extname = ".js";
        }))
        .pipe(gulp.dest('./app/build/js/'));
});


gulp.task('html-replace',function() {
    var opts = {comments:false,spare:false,quotes:true};
    return gulp.src('./app/*.html')
        .pipe(htmlreplace({
            'css': 'css/all.min.css',
            'js': 'js/test.min.js'
        }))
        .pipe(minifyHTML(opts))
        .pipe(gulp.dest('./app/build/'));
});


gulp.task('compass',function(){
    return gulp.src('./app/style/scss/*.scss')
        .pipe(compass({
            config_file: './app/style/scss/config.rb',
            sourcemap: true,
            time: true,
            css: './app/style/css/',
            sass: './app/style/scss/',
            style: 'compact' //nested, expanded, compact, compressed
        }))
        .pipe(gulp.dest('./app/style/css/'));
});

// gulp.task('watch',function(){
//     gulp.watch('./app/style/scss/*.scss',['compass']);
// });


// gulp.task('extend', function () {
//     gulp.src('./app/dist/*.html')
//         .pipe(extender({annotations:false,verbose:false})) // default options
//         .pipe(gulp.dest('./app/preview/'));
// });



gulp.task('md',function(){
    return gulp.src('./app/md/**/*.md')
        .pipe(md())
        .pipe(gulp.dest('./app/md/md2html/'));
});


gulp.task('extend', ['md'], function () {
    return gulp.src('./app/md/md2html/**/*.html')
        .pipe(extender({annotations:false,verbose:false}))
        .pipe(gulp.dest('./app/preview/'));
});

gulp.task('watch',function(){
    gulp.watch('./app/md/**/*.md', ['extend']);
});


gulp.task('webserver', ['extend'],function() {
    return gulp.src('./app/preview/')
        .pipe(webserver({
            port:1111,
            livereload: true,
            directoryListing: false,
            open: true,
            fallback: 'test.html'
        }));
});
gulp.task('default',['watch','webserver']);

// gulp.task('default',['extend']);

// gulp.task('default',['compass','watch']);

// gulp.task('default', ['html-replace','minify-css', 'uglify']);
