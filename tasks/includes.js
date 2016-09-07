/**
 *  Copies all includes files to the dist root directory
 */

export default (gulp, plugins, paths, errOut) => {
  return () => (
    gulp.src(paths.includes.src)
      .pipe(plugins.plumber({ errorHandler: errOut }))
      .pipe(plugins.newer(paths.includes.build))
      .pipe(gulp.dest(paths.includes.build))
      .pipe(plugins.browserSync.stream())
  );
};
