'use strict';

import gulp from 'gulp';

/**
 *  Compile all Sass files to a plain CSS base.css in /dist/css/
 *  Apply autoprefixer for all necessary vendor prefixes
 *  Minifies base.css using CSSNano (with a few optimisations disabled)
 *  Create a separate sourcemap file base.css.map in /dist/css
 */

export default (plugins, path, errOut) => {
  return () => (
    gulp.src(path.src)
      .pipe(plugins.sourcemaps.init())
        .pipe(plugins.plumber({ errorHandler: errOut }))
        .pipe(plugins.newer(path.build))
        .pipe(plugins.sass())
        .pipe(plugins.cssnano())
      .pipe(plugins.sourcemaps.write('.'))
      .pipe(gulp.dest(path.build))
      .pipe(plugins.browserSync.stream())
  )
};
