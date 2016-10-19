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

gulp.task('styles', styles(plugins, config.paths.sass, errOut));
gulp.task('scripts', scripts(plugins, config.paths.js, errOut));
gulp.task('templates', templates(plugins, config.paths.templates, errOut));
gulp.task('includes', includes(plugins, config.paths.includes, errOut));
gulp.task('vendor', vendor(config.paths.vendor, errOut));
gulp.task('images', images(config.paths.images, errOut));
gulp.task('fonts', fonts(config.paths.fonts, errOut));

// Combines all tasks into a distribution build
gulp.task('build', [
  'styles',
  'scripts',
  'templates',
  'includes',
  'vendor',
  'images',
  'fonts',
  ]);

// Watch tasks
gulp.task('default', ['serve', 'vendor', 'images', 'fonts'], () => {
  gulp.watch(config.paths.sass.src, ['styles']);
  gulp.watch(config.paths.js.src, ['scripts']);
  gulp.watch(config.paths.templates.src, ['templates']);
  gulp.watch(config.paths.includes.src, ['includes']);
});
