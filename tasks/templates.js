/**
 *  Copies all template files to the dist root directory
 */

import { paths } from '../gulpfile.config.js';

export default (gulp, plugins, errOut) => {
  return () => (
    gulp.src(paths.templates.src)
      .pipe(plugins.plumber({ errorHandler: errOut }))
      .pipe(plugins.newer(paths.templates.build))
      .pipe(gulp.dest(paths.templates.build))
      .pipe(plugins.browserSync.stream())
  );
};
