# WPBP Theme
==========

Bare-bones theme configuration using SCSS for [Roots](http://roots.io/), a WordPress starter theme based on [HTML5 Boilerplate](http://html5boilerplate.com/) & [Bootstrap](http://getbootstrap.com/) that will help you make better themes.

## Deviations from default Roots theme:

* SCSS structure/organization - a boilerplate file structure, expecting certain styles to go in certain files. Also includes a few default styles, such as legibility optimizations and an alternative `@mixin` for Retina/HiDPI background images.
* Only a subset of Bootstrap CSS included by default. To add more, uncomment the `@import`'s you need in `assets/scss/_bootstrap.scss`. (All Bootstrap files are kept pristine and update-friendly.)
* No Bootstrap JS included by default, and `assets/js/main.js` only includes the `Roots` namespace + DOM-based Routing.
* Bootstrap top navbar off by default.
* Bootstrap thumbnails for galleries off by default.
* Nice search disabled, preferring the WP default of using the /?s= parameter, as this makes it easier to set up Google Analytics' site search tracking.
* Google Analytics tracking code is only included if `WPBP_ENV == 'production'` and no user is logged in. (Note: the `WPBP_ENV` constant is defined by the [WordPress Boilerplate config package](https://github.com/cabgfx/wpbp-config), but this theme does not require it.)
* All theme activation options are off by default, to prevent “accidents” when installing the theme on sites with existing content.
* No “You're using an outdated browser…” message for IE8 and below.