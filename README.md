# WPBP Theme

Bare-bones WordPress theme boilerplate configuration.

Originally based on the [Roots](https://roots.io/) theme, but has since diverged significantly.

## Deviations from default Roots theme:

(Note: This theme was originally forked from a much earlier version of Roots, and does not compare to the current version of Roots.)

### Workflow
* No specific build process — use what you prefer. I prefer to start as simple as possible. Minification and concatenation is up to you, and the toolchain you prefer.
* VS Code with [Live Sass Compiler](https://marketplace.visualstudio.com/items?itemName=glenn2223.live-sass) for simple and easy SCSS compiling is preferred, but not required.
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

## Getting Started

- Download the latest .zip file from GitHub
- Unzip the file and rename the folder to your theme's shortname
- Move the folder to your WordPress themes directory
- Activate the theme in the WordPress admin

### Compiling SCSS

You'll need to compile the SCSS stylesheets to CSS.

I recommend using VS Code with the [Live Sass Compiler](https://marketplace.visualstudio.com/items?itemName=glenn2223.live-sass) extension for simple and easy SCSS compiling, but you can use any tool you prefer.

#### Using VS Code

If you are using VS Code, the theme includes a `.vscode` folder with recommended settings for the Live Sass Compiler extension.

*IMPORTANT*: You'll need to change `.vscode/settings.json` to set the "liveSassCompile.settings.includeItems" to include the correct path to your theme's SCSS file.

## Hooks provided with this theme

### Actions

`wpbp-before-main`

Called before the main.. `<main>` content wrapper.

Ideal for rendering eg. a Custom Header for your child theme.

`wpbp-after-main`

Called after the main.. `<main>` content wrapper.
