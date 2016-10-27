'use strict';

import gulp from 'gulp';
import postcssScss from 'postcss-scss';

const syntax = {
  scss: postcssScss,
};

// Lint SCSS with Stylelint
export const lintScss = (path, plugins) => {
  return () => {
    const processors = [
      plugins.stylelint(),
      plugins.postcssReporter({ clearMessages: true }),
    ];
    return gulp.src(path.src)
     .pipe(plugins.postcss(processors, { syntax: syntax.scss }))
  }
}
