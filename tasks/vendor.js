export default (gulp, plugins, paths, errOut) => {
  return () => (
    gulp.src(paths.vendor.src)
      .pipe(gulp.dest(paths.vendor.build))
  );
};
