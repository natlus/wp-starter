'use strict';

import gulp from 'gulp';
import loadPlugins from 'gulp-load-plugins';

import config from './gulpfile.config.js';

import styles from './tasks/styles';
import scripts from './tasks/scripts';
import templates from './tasks/templates';
import includes from './tasks/includes';
import vendor from './tasks/vendor';
import images from './tasks/images';
import fonts from './tasks/fonts';

const plugins = loadPlugins({
  pattern: '*',
});

// Error output
function errOut(err) {
  console.log(err);
  this.emit('end');
}

// Setup BrowserSync with local vhosts server
gulp.task('serve', () => {
  plugins.browserSync.init({
    proxy: config.domain,
    notify: false,
    open: false,
  });
});

gulp.task('styles', styles(gulp, plugins, config.paths, errOut));
gulp.task('scripts', scripts(gulp, plugins, config.paths, errOut));
gulp.task('templates', templates(gulp, plugins, config.paths, errOut));
gulp.task('includes', includes(gulp, plugins, config.paths, errOut));
gulp.task('vendor', vendor(gulp, plugins, config.paths, errOut));
gulp.task('images', images(gulp, plugins, config.paths, errOut));
gulp.task('fonts', fonts(gulp, plugins, config.paths, errOut));

// Watch tasks
gulp.task('default', ['serve', 'vendor', 'images', 'fonts'], () => {
  gulp.watch(config.paths.sass.src, ['styles']);
  gulp.watch(config.paths.js.src, ['scripts']);
  gulp.watch(config.paths.templates.src, ['templates']);
  gulp.watch(config.paths.includes.src, ['includes']);
});
