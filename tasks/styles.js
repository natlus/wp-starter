/**
 *  Compile all Sass files to a plain CSS base.css in /dist/css/
 *  Apply autoprefixer for all necessary vendor prefixes
 *  Minifies base.css using CSSNano (with a few optimisations disabled)
 *  Create a separate sourcemap file base.css.map in /dist/css
 */

import { paths } from '../gulpfile.config.js';

export default (gulp, plugins, errOut) => {
  return () => (
    gulp.src(paths.sass.src)
      .pipe(plugins.sourcemaps.init())
        .pipe(plugins.plumber({ errorHandler: errOut }))
        .pipe(plugins.newer(paths.sass.build))
        .pipe(plugins.sass())
        .pipe(plugins.autoprefixer())
        .pipe(plugins.cssnano({
          autoprefixer: false,
          discardUnused: false,
          mergeIdents: false,
          mergeLonghand: false,
          mergeRules: false,
          reduceIdents: false,
          reduceTransforms: false,
        }))
      .pipe(plugins.sourcemaps.write('.'))
      .pipe(gulp.dest(paths.sass.build))
      .pipe(plugins.browserSync.stream())
  )
};
