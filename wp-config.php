<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'realdan' );
/** Database username */
define( 'DB_USER', 'root' );
/** Database password */
define( 'DB_PASSWORD', '' );
/** Database hostname */
define( 'DB_HOST', 'localhost' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '_AOk@|]&Sp^tfFsg Kvz;]`pc!]Z1:3B1US>X|lQh[ObrrJK=m*{^R,u+Sd*,ffx' );
define( 'SECURE_AUTH_KEY',   ')T{c5T-Mb#/4Tgbm&>_:}-Ru&0^,q!E2Z8CX^h!3hg;`-El$ggBq_)OHBpLqDlwo' );
define( 'LOGGED_IN_KEY',     'd|rh5Pi[pX0x/gwP,hO]s+f94EA{]f;j~+v)7dbR>4FNTqG0c5_o&rfRqcZtNr/O' );
define( 'NONCE_KEY',         'h#y<nxSkZ7;J#OVI<V;[b1y;8e7QkW],HYJqdc.l+iOKIRc#)7:]T]_n|c}:=q-!' );
define( 'AUTH_SALT',         'xE2qOm 3I$D9-tqVjd-}i.dl7)ys_/JI*6Kas>zYRoM3f}I6Iz%3pn,Mz .6F.>p' );
define( 'SECURE_AUTH_SALT',  '2?2{URcw/XjqlIkb2QXm&P,^0> ] oDzfAWS4gn1mH3Y).dBF8A;x]y6?:gWe!@0' );
define( 'LOGGED_IN_SALT',    '{$(^w:7wM)ALA,RGOoeViom<2a&jZ3I0Uo*y^i(#d(+yN(#cbW_}R5[oRw1*+1~K' );
define( 'NONCE_SALT',        '_j/ !pwrnEG)wV+>W6aEje6%mxZBJo+eqyS^WvJ)+Ai:FdD+kqLVHxdVPtusiLW:' );
define( 'WP_CACHE_KEY_SALT', 'wmzab|OA:cz(cA8;{PnK;#JSa(0z=ejg>I*nzyV!;^T{41Ydq.YfOJj2C{&Sk5_R' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hv4lx9vy_';
/* Add any custom values between this line and the "stop editing" line. */
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';