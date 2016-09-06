import { paths } from '../gulpfile.config.js';

export default (gulp, plugins, errOut) => {
  return () => (
    gulp.src(paths.fonts.src)
      .pipe(gulp.dest(paths.fonts.build))
  );
};
