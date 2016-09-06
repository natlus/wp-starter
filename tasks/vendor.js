import { paths } from '../gulpfile.config.js';

export default (gulp, plugins, errOut) => {
  return () => (
    gulp.src(paths.vendor.src)
      .pipe(gulp.dest(paths.vendor.build))
  );
};
