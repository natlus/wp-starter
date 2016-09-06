import { paths } from '../gulpfile.config.js';

export default (gulp, plugins, errOut) => {
  return () => (
    gulp.src(paths.images.src)
      .pipe(gulp.dest(paths.images.build))
  );
};
