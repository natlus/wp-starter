/**
 *  Transpile all js files with babel down to native JS
 *  Combines all separate js files into one index.js in dist/js/
 *  Minifies index.js using gulp-uglify
 *  Create a separate sourcemap file index.js.map in /dist/js
 */

export default (gulp, plugins, paths, errOut) => {
  return () => (
    gulp.src(paths.js.src)
      .pipe(plugins.sourcemaps.init())
        .pipe(plugins.plumber({ errorHandler: errOut }))
        .pipe(plugins.newer(paths.js.build))
        .pipe(plugins.babel({
          presets: ['es2015']
        }))
        .pipe(plugins.concat('index.js'))
        .pipe(plugins.uglify())
      .pipe(plugins.sourcemaps.write('.'))
      .pipe(gulp.dest(paths.js.build))
      .pipe(plugins.browserSync.stream())
  );
};
