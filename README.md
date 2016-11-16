BurgerMenu plugin 0.1.6
=======================

On mobile devices, more and more sites feature a fixed-position icon that, when tapped, reveal a hidden navigation menu. This plugin enables a hamburger menu in the default themes that come together with Yellow.

As soon as your site gets smaller than 32em (default), the standard navigation and the sidebar will be replaced by the burger menu. If activated, a popup will show the navigation AND the sidebar.


How to configure?
-----------------

Just install the plugin and insert the following lines in your "main" css file, near the end, just before the `@media print` section:

    @media screen and (max-width:32em) {
      /* Burger */
      #burger-icon { display: block; }
      .burger-navigation { display: block; }
      .navigation { display: none; }
    }

Depending on your theme, you might have to fiddle a little with the colours, positions and borders in `burger-menu.css`

Additionally you can use a shortcut to generate a menu containing the child pages. Particularly useful in a sidebar.

`[subpages LOCATION PAGESMAX]`

The following arguments are available, all but the first argument are optional:

`LOCATION` = parent location  
`PAGESMAX` = max number of pages


How to install?
---------------

1. [Download and install Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/richi/yellow-plugin-burgermenu/archive/master.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `master.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

This code might eat all your data or nuke your server. Use at your own risk.


