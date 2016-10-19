'use strict';

import gulp from 'gulp';

/**
 * Copies all images to the build directory
 *
 */

export default (path, errOut) => {
  return () => (
    gulp.src(path.src)
      .pipe(gulp.dest(path.build))
  );
};
