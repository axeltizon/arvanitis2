<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'arvanitis2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'D`]n<13wnr/sL#YKD+8{R>4W=zSRCYRzGpgAU;ONM6^,=2]s&r76E>[/Yk!jvOV?');
define('SECURE_AUTH_KEY',  'wG9c-LrcA%;F?b[O%I=c*V1+:/I8gT6hy8wG[DJRN!s}Meu!dHt<J-W?t)6dc6JZ');
define('LOGGED_IN_KEY',    '>)Xm`mV49!NXpBH?zA?:`WAw6*5n!}zXP;#=0<0}u$^(X@Y*fCl}N>O6Zyb1SWn,');
define('NONCE_KEY',        'Fw^}wm}@dD-!0bV1~l+kAP}3L<Jr-~(VTq.MSbF-/8eRPU$TAV%]3Z9]DNQ>G#gY');
define('AUTH_SALT',        ')?Fs5l riOo~dq1aXA$(`k#?km[K1,y8<2#INB&+JgK,|dyh<v/<aXmUcw@BAldJ');
define('SECURE_AUTH_SALT', '6:9v}m[;`$f%M0d3>8Q9fuQ73H}=udGvkf]]Ld# mksdQnf2loZS|bJ[<O84#fBX');
define('LOGGED_IN_SALT',   '9]^q|:j8]8i=j;u}Wzu-$5nzH[(=P7c*PLg,Tt]+ue$2(0{p^ArDO*yTD8p2FAJ$');
define('NONCE_SALT',       '@_JkuC[tfCjppQ=Z,G63 }ol-BaO6:60W.D7~dVtz]|RYd6#z#t!1/E`#CBn!nZA');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
