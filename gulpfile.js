const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const cssnano = require('gulp-cssnano');
const rename = require('gulp-rename');
const browserSync = require('browser-sync').create();

// Definir los paths aquí
const paths = {
  sass: 'src/sass/**/*.scss',
  js: 'src/js/**/*.js',
  // images: 'src/images/**/*' // Comentado porque no se va a usar ahora
};

function compileSass() {
  return src(paths.sass)
    .pipe(sass().on('error', sass.logError))
    .pipe(cssnano())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest('dist/css'))
    .pipe(browserSync.stream());
}

function minifyJs() {
  return src(paths.js)
    .pipe(concat('main.js'))
    .pipe(terser())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest('dist/js'))
    .pipe(browserSync.stream());
}

function serve(done) {
  browserSync.init({
    server: {
      baseDir: './'
    }
  });
  watch(paths.sass, compileSass);
  watch(paths.js, minifyJs);
  // watch(paths.images, optimizeImages); // Comentado porque no se va a usar ahora
  watch('./*.php').on('change', browserSync.reload);
  done();
}

exports.default = series(
  parallel(compileSass, minifyJs),
  serve
);
