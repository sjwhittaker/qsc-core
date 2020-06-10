# QSC-Core
QSC-Core is a set of CSS, JS and PHP files that provide common styling and functionality used in several of the author's projects. This includes rules, functions and classes to:
- display and handle form elements;
- connect to and query a database; and,
- handle common operations (*e.g.*, removing identical values in an array).


## jQuery, Bootstrap and FontAwesome
You'll need to include [jQuery](https://jquery.com/download/), [Bootstrap](https://getbootstrap.com/docs/4.4/getting-started/download/) and [FontAwesome](https://fontawesome.com/how-to-use/on-the-web/setup/hosting-font-awesome-yourself) as follows:
- put `bootstrap.min.css`, `fontawesome.css` and `solid.css` (from FontAwesome) in `QSC_CORE_CSS_DIRECTORY_LINK`;
- define `QSC_CORE_JQUERY_LINK` correctly;
- put `bootstrap.bundle.min.js` in `QSC_CORE_JS_DIRECTORY_LINK`; and,
- put FontAwesome's font files in `QSC_CORE_CSS_DIRECTORY_LINK/fonts`.


### `config.php`
The file `config.php` defines constants and `include`s the other files in QSC-Core. You'll need to rename and edit `config-skeleton.php` to ensure that the file system constants match your setup.

All of the constants in `constants.php` are only defined if a prior value doesn't already exist. You can `define` them in `config.php` first to override the values.


## Note
Block comments are complete, but `phpDoc` comments for functions are incomplete as of June, 2020. Comments are less complete in JavaScript files.


## Background
This package was initially created for use by  multiple projects developed for the [School of Computing](https://www.cs.queensu.ca/) at [Queen's University](https://www.queensu.ca/) in Kingston, Ontario, Canada.

It was later extended while developing QSC-CMP under the direction of the [Faculty of Arts and Science](https://www.queensu.ca/artsci/) and the [Office of the Vice-Provost (Teaching and Learning)](https://www.queensu.ca/provost/teaching-and-learning/vice-provost-teaching-and-learning).
