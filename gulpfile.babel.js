'use strict';

import gulp from 'gulp';
import gulpLoadPlugins from 'gulp-load-plugins';

const $ = gulpLoadPlugins({
  pattern: '*',
});

const domain = 'ddone.dev';

// Config for all dist/src directories
const paths = {
  'sass': {
    'src': './src/styles/**/*.scss',
    'build': './build/css/',
    'dist': './dist/css/',
  },
  'js': {
    'src': './src/scripts/**/*.js',
    'build': './build/js/',
    'dist': './dist/js/',
  },
  'templates': {
    'src': './src/templates/**/*',
    'build': './build/',
    'dist': './dist/',
  },
  'includes': {
    'src': './src/includes/**/*.php',
    'build': './build/includes/',
    'dist': './dist/includes/',
  },
  'vendor': {
    'src': [],
    'build': './build/lib/',
    'dist': './dist/lib/',
  },
  'images': {
    'src': './src/images/**/*',
    'build': './build/images/',
    'dist': './dist/images/',
  },
  'fonts': {
    'src': './src/fonts/**/*',
    'build': './build/fonts/',
    'dist': './dist/fonts/',
  }
};

// Error output
function errOut(err) {
  console.log(err);
  this.emit('end');
}

// Initiate BrowserSync with local vhosts server
gulp.task('serve', () => {
  $.browserSync.init({
    proxy: domain,
    notify: false,
    open: false,
  });
});

/**
 *  Compile all Sass files to a plain CSS base.css in /dist/css/
 *  Apply autoprefixer for all necessary vendor prefixes
 *  Minifies base.css using CSSNano (with a few optimisations disabled)
 *  Create a separate sourcemap file base.css.map in /dist/css
 */

gulp.task('styles', () => (
  gulp.src(paths.sass.src)
    .pipe($.sourcemaps.init())
      .pipe($.plumber({ errorHandler: errOut }))
      .pipe($.newer(paths.sass.build))
      .pipe($.sass())
      .pipe($.autoprefixer())
      .pipe($.cssnano({
        autoprefixer: false,
        discardUnused: false,
        mergeIdents: false,
        mergeLonghand: false,
        mergeRules: false,
        reduceIdents: false,
        reduceTransforms: false,
      }))
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest(paths.sass.build))
    .pipe($.browserSync.stream())
));

/**
 *  Transpile all js files with babel down to native JS
 *  Combines all separate js files into one index.js in dist/js/
 *  Minifies index.js using gulp-uglify
 *  Create a separate sourcemap file index.js.map in /dist/js
 */

gulp.task('scripts', () => (
  gulp.src(paths.js.src)
    .pipe($.sourcemaps.init())
      .pipe($.plumber({ errorHandler: errOut }))
      .pipe($.newer(paths.js.build))
      .pipe($.babel({
        presets: ['es2015']
      }))
      .pipe($.concat('index.js'))
      .pipe($.uglify())
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest(paths.js.build))
    .pipe($.browserSync.stream())
));

/**
 *  Copies all template files to the dist root directory
 */

gulp.task('templates', () => (
  gulp.src(paths.templates.src)
    .pipe($.plumber({ errorHandler: errOut }))
    .pipe($.newer(paths.templates.build))
    .pipe(gulp.dest(paths.templates.build))
    .pipe($.browserSync.stream())
));

/**
 *  Copies all includes files to the dist root directory
 */

gulp.task('includes', () => (
  gulp.src(paths.includes.src)
    .pipe($.plumber({ errorHandler: errOut }))
    .pipe($.newer(paths.includes.build))
    .pipe(gulp.dest(paths.includes.build))
    .pipe($.browserSync.stream())
));

/**
 *  Copies npm packages from node_modules to build/dist lib directory
 */

gulp.task('vendor', () => (
  gulp.src(paths.vendor.src)
    .pipe(gulp.dest(paths.vendor.build))
));

// Images
gulp.task('images', () => (
  gulp.src(paths.images.src)
    .pipe(gulp.dest(paths.images.build))
));

// Fonts
gulp.task('fonts', () => (
  gulp.src(paths.fonts.src)
    .pipe(gulp.dest(paths.fonts.build))
));

// Watch tasks
gulp.task('default', ['serve', 'vendor', 'images', 'fonts'], () => {
  gulp.watch(paths.sass.src, ['styles']);
  gulp.watch(paths.js.src, ['scripts']);
  gulp.watch(paths.templates.src, ['templates']);
  gulp.watch(paths.includes.src, ['includes']);
});
