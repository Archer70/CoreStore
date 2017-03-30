# CoreStore [![Build Status](https://travis-ci.org/Archer70/CoreStore.svg?branch=master)](https://travis-ci.org/Archer70/CoreStore)
A simple store mod for SMF.

## Recommended Setup
Currently the best way to set up a development environment is to symbolically link the mod files to your forum. This allows you to make "live" changes on your forum and have those changes carry over to your local git repo as well.

1. Clone the repo.
2. Install your forum.
3. Run the build.php script from CLI to generate a mod package in dist, then install said package.
```
php -e build.php
```
4. REMOVE the source directories from the forum.
```bash
rm -r Sources/cs_source
rm -r Themes/default/cs_template
rm -r Themes/default/css/cs_styles
rm -r Themes/default/scripts/cs_scripts
rm -r Themes/default/languages/cs_language
```
5. Link the source directores from the repo to the appropriate places in your forum.
```bash
# format: ln -s [target] [link_name]
ln -s $SERVER/CoreStore/cs_source $SERVER/test-forum/Sources/cs_source
ln -s $SERVER/CoreStore/cs_template $SERVER/test-forum/Themes/default/cs_template
ln -s $SERVER/CoreStore/cs_styles $SERVER/test-forum/Themes/default/css/cs_styles
ln -s $SERVER/CoreStore/cs_scripts $SERVER/test-forum/Themes/default/scripts/cs_scripts
ln -s $SERVER/CoreStore/cs_language $SERVER/test-forum/Themes/default/languages/cs_language
```

Now your forum is connected to the repo, so you can commit changes easily.
