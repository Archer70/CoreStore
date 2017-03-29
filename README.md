# CoreStore [![Build Status](https://travis-ci.org/Archer70/CoreStore.svg?branch=master)](https://travis-ci.org/Archer70/CoreStore)
A simple store mod for SMF.

## Recommended Setup
Currently the best way to set up a development environment is to symbolically link the mod files to your forum. This allows you to make "live" changes on your forum and have those changes carry over to your local git repo as well.

1. Clone the repo.
2. Install your forum.
3. Zip the repo directory and install the package on your forum.
4. REMOVE the source directories from the forum.
```bash
rm -r Sources/cs_source Themes/default/cs_template Themes/default/css/cs_styles
```
5. Link the source directores from the repo to the appropriate places in your forum.
```bash
# format: ln -s [target] [link_name]
ln -s $SERVER/CoreStore/cs_source $SERVER/test-forum/Sources/cs_source
ln -s $SERVER/CoreStore/cs_template $SERVER/test-forum/Themes/default/cs_template
ln -s $SERVER/CoreStore/cs_styles $SERVER/test-forum/Themes/default/css/cs_styles
```

Now your forum is connected to the repo, so you can commit changes easily.
