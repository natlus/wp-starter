export default {
  'domain': 'ddone.dev',
  'paths': {
    'sass': {
      'src': './src/styles/**/*.scss',
      'build': './build/css/',
      'dist': './dist/css/',
    },
    'js': {
      'src': './src/scripts/**/*.js',
      'build': './build/js/',
      'dist': './dist/js/',
    },
    'templates': {
      'src': './src/templates/**/*',
      'build': './build/',
      'dist': './dist/',
    },
    'includes': {
      'src': './src/includes/**/*.php',
      'build': './build/includes/',
      'dist': './dist/includes/',
    },
    'vendor': {
      'src': [],
      'build': './build/lib/',
      'dist': './dist/lib/',
    },
    'images': {
      'src': './src/images/**/*',
      'build': './build/images/',
      'dist': './dist/images/',
    },
    'fonts': {
      'src': './src/fonts/**/*',
      'build': './build/fonts/',
      'dist': './dist/fonts/',
    }
  }
};