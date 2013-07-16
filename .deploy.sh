# Compile stuff
/var/www/virtual/plusplus/libs/sass/bin/sass --update assets/scss/main.scss:assets/css/main.css -f -t compressed

/var/www/virtual/plusplus/libs/coffee/bin/coffee -c --output assets/base/js assets/base/coffee/*
/var/www/virtual/plusplus/libs/uglify/bin/uglifyjs assets/base/js/ajax.js -o assets/js/main.js

# Remove the .sass-cache folder - who needs that xD
rm -R .sass-cache