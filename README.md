# WPBP Theme

Bare-bones theme configuration using SCSS for [Roots](http://roots.io/), a WordPress starter theme based on [HTML5 Boilerplate](http://html5boilerplate.com/) & [Bootstrap](http://getbootstrap.com/) that will help you make better themes.

## Deviations from default Roots theme:

(Note: This theme was originally forked from a much earlier version of Roots, and does not compare to the current version of Roots.)

### Workflow
* No specific build process — use what you prefer. I prefer to start as simple as possible. Minification and concatenation is up to you, and the toolchain you prefer.
* VS Code with [LiveSass](https://marketplace.visualstudio.com/items?itemName=ritwickdey.live-sass) for simple and easy SCSS compiling is preferred, but not required.
* I recommend using [WP Rocket](https://wp-rocket.me/) for optimizing asset delivery on your live site.


### Assets
* Only a subset of Bootstrap CSS included by default. To add more, uncomment the `@import`'s you need in `assets/scss/_bootstrap.scss`. (All Bootstrap files are kept pristine and update-friendly.)
* Almost no default Bootstrap JS included initially, and `assets/js/main.js` only includes the `Roots` namespace + DOM-based Routing.

### Components & configurations
* Bootstrap top navbar off by default.
* Roots' “Nice search” feature is removed, preferring the WP default of using the /?s= parameter, as this makes it easier to set up Google Analytics' site search tracking.
* Google Analytics tracking code is only included if `WPBP_ENV == 'production'` and no user is logged in. (Note: the `WPBP_ENV` constant is defined in the [WordPress Boilerplate config package](https://github.com/cabgfx/wpbp-config), but the theme is fully functional without it.)
* All theme activation options are off by default, to prevent “accidents” when installing the theme on sites with existing content.
* No “You're using an outdated browser…” message for IE8 and below.
