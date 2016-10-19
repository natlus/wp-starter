'use strict';

import gulp from 'gulp';

/**
 * Copies all PHP scripts to the build directory
 *
 */

export default (plugins, path, errOut) => {
  return () => (
    gulp.src(path.src)
      .pipe(plugins.plumber({ errorHandler: errOut }))
      .pipe(plugins.newer(path.build))
      .pipe(gulp.dest(path.build))
      .pipe(plugins.browserSync.stream())
  );
};
