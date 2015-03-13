This theme is in development. Breaking changes may occur frequently.

# UCSC Drupal v3 

A responsive re-write of the campus Drupal theme.

## 1. Installation

### As a normal Drupal theme

- Download the [latest development release](https://github.com/knice/ucsc-drupal/releases).
- Upzip the theme in your `sites/(all OR default)/themes/` directory.

### For development

- Clone this repository into the `sites/(all OR default)/themes/` directory of your Drupal installation.  

### For development, the nerdy way

Add it as a git submodule in your git-maintained Drupal installation.  

- cd into your `sites/(all OR default)/themes/` directory.
- `git submodule add git@github.com:knice/ucsc-drupal.git ucsc`


## 2. Compiling sass to css

- Install [sass](http://sass-lang.com/install) >= v3.4.13.
- From the theme directory, use the following command:
`sass sass/ucsc.scss:css/ucsc.css --watch`