var gulp = require("gulp"),
      sass = require("gulp-sass"),  
      plumber = require("gulp-sass"),
      browserSync = require("browser-sync").create(),
      sourcemaps = require('gulp-sourcemaps'),
      autoprefixer = require('gulp-autoprefixer'),
      sourcemaps = require('gulp-sourcemaps');
      
const
      themeLoc = './',
      sassLoc = themeLoc + 'sass/**/*.sass',
      phpLoc = themeLoc + '**/*.php',
      urlToPreview = 'http://sazzypress.local/';

gulp.task('sass', function () {
      return gulp
            .src(sassLoc)
            .pipe(sourcemaps.init())
            .pipe(sass().on("error", sass.logError))
            .pipe(autoprefixer({
                  overrideBrowserslist: ['last 2 versions'],
                  cascade: false
            }))
            .pipe(sourcemaps.write())
            .pipe(sass())
            .pipe(gulp.dest(themeLoc))
            .pipe(browserSync.stream());
});

gulp.task('php', function () {
      gulp.src(phpLoc)
            .pipe(plumber());
});

gulp.task('watch-bs', function () {

      browserSync.init({
            notify: false,
            proxy: urlToPreview,
            port: 3000
      });

      gulp.watch(phpLoc).on('change', browserSync.reload);
      gulp.watch(sassLoc, gulp.series('sass'));
});

