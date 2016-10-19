'use strict';

import gulp from 'gulp';

/**
 * Extracts necessary libraries from node_modules/ to the build directory
 * Libraries to be used in build are set in the gulp config vendor object.
 */

export default (path, errOut) => {
  return () => (
    gulp.src(path.src)
      .pipe(gulp.dest(path.build))
  );
};
