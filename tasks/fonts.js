export default (gulp, plugins, paths, errOut) => {
  return () => (
    gulp.src(paths.fonts.src)
      .pipe(gulp.dest(paths.fonts.build))
  );
};
