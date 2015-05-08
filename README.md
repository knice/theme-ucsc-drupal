This theme is in development. Breaking changes may occur frequently.

# UCSC Drupal v3 

A responsive re-write of the campus Drupal theme.

## Use as a normal Drupal theme

- Developers/Testers: Download the [latest build](http://ucsc-drupal.s3-website-us-east-1.amazonaws.com/ucsc.zip).
- End-users: the [latest development release](https://github.com/knice/ucsc-drupal/releases).
- Upzip the theme in your `sites/(all OR default)/themes/` directory.

****

## Installing for development

### 1. Setup your Drupal environment 

Setting up for development takes some time, but it is worth it.

- [Follow these instructions](https://www.drupal.org/node/2008792) to install Vagrant Drupal Development (it will also walk you through installation of Vagrant and VirtualBox).
- Continue to follow the instructions to setup Drupal 7 with Drush.
- A couple of helpful development modules are Devel and Styleguide. Install them with drush using:
    + `drush @drupal7 dl devel`
    + `drush @drupal7 dl styleguide`

### 2. Install the theme

Use `drush` to manage your Drupal installation and `git` to manage this theme.

- Clone this repository into the `sites/(all OR default)/themes/` directory of your Drupal installation with:
`git clone git@github.com:knice/ucsc-drupal.git`

### 3. Compiling sass to css

For basic sass --> css development, follow the directions below.

- Install [sass](http://sass-lang.com/install) >= v3.4.13.
- From the theme directory, use the following command:
`sass sass/ucsc.scss:css/ucsc.css --watch`

### 3a. Using Gulp (optional)

For managing additional assets (svg images, icon systems, images, scripts), you'll need to install Node so you can compile these assets with Gulp.

- Install [Homebrew](http://brew.sh)
- Install the Ruby version manager rbenv with:
  - `brew install rbenv`
  - then `brew install ruby-build`
- Install Ruby with `rbenv install 2.2.0`
- Modify `$PATH` in `.bash_profile` (per [Stack Overflow](http://stackoverflow.com/a/12150580/1258502))
- Switch the Ruby 2.2.0 with:
  - `rbenv rehash`
  - then `rbenv global 2.2.0`
  - Now `ruby -v` should return "2.2.0"
- Install Sass, [Bourbon](http://bourbon.io), and [Neat](http://neat.bourbon.io) with `gem install sass bourbon neat`

Now you can simply run `gulp` in the theme directory and stylesheets will automatically compile.