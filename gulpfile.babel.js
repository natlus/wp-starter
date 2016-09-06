'use strict';

import gulp from 'gulp';
import loadPlugins from 'gulp-load-plugins';

import { paths, domain } from './gulpfile.config.js';

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
    proxy: domain,
    notify: false,
    open: false,
  });
});

gulp.task('styles', styles(gulp, plugins, errOut));
gulp.task('scripts', scripts(gulp, plugins, errOut));
gulp.task('templates', templates(gulp, plugins, errOut));
gulp.task('includes', includes(gulp, plugins, errOut));
gulp.task('vendor', vendor(gulp, plugins, errOut));
gulp.task('images', images(gulp, plugins, errOut));
gulp.task('fonts', fonts(gulp, plugins, errOut));

// Watch tasks
gulp.task('default', ['serve', 'vendor', 'images', 'fonts'], () => {
  gulp.watch(paths.sass.src, ['styles']);
  gulp.watch(paths.js.src, ['scripts']);
  gulp.watch(paths.templates.src, ['templates']);
  gulp.watch(paths.includes.src, ['includes']);
});
