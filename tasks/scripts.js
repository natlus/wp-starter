'use strict';

import gulp from 'gulp';

/**
 *  Transpiles all js files with babel down to native JS
 *  Combines all separate js files into one index.js in dist/js/
 *  Minifies index.js using gulp-uglify
 *  Create a separate sourcemap file index.js.map in /dist/js
 */

export default (plugins, path, errOut) => {
  return () => (
    gulp.src(path.src)
      .pipe(plugins.sourcemaps.init())
        .pipe(plugins.plumber({ errorHandler: errOut }))
        .pipe(plugins.newer(path.build))
        .pipe(plugins.babel({
          presets: ['es2015']
        }))
        .pipe(plugins.concat('index.js'))
        .pipe(plugins.uglify())
      .pipe(plugins.sourcemaps.write('.'))
      .pipe(gulp.dest(path.build))
      .pipe(plugins.browserSync.stream())
  );
};
