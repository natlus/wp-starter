export default (gulp, plugins, paths, errOut) => {
  return () => (
    gulp.src(paths.images.src)
      .pipe(gulp.dest(paths.images.build))
  );
};
