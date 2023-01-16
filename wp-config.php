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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'productive_shop_assignment_raju_mondal' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '7;@Lu-{JZiz/8b`T[|/ErWuU>[pL5 2hu2:S`ayJ?FZ/zXwQ?|`l/@UMMM,NIg=O' );
define( 'SECURE_AUTH_KEY',  '8wE M&`yvcu3:[9P /Z=4i.dTOU<I^4|`ngf5|wQ%d8D/%FF}*pIKK>ZH,y=p4L`' );
define( 'LOGGED_IN_KEY',    '@qTyLr6m#?]UL$nk<RPU7Pjz=_1`n7_Ar1d>>7jF6i!>Ao!qP#>w29= |L!~zQ63' );
define( 'NONCE_KEY',        '2hGlOrEXk >5u~bG}ZQ XmvMOBAECRrJ?Xhu#*Wg_eQcL+b?-!#xHNPNEvb[WH5*' );
define( 'AUTH_SALT',        'Kg&]JVV04_D J)^Qe8NMe#6 U/)0L?u^*^G!J^|@UzZ&d~|g$COI/X{Ohah<**%)' );
define( 'SECURE_AUTH_SALT', 'e0dW1irALcWj9)JZ6 @C[;ck,0+&:O%Yy^MNu,h5e{QtQbKk6A{-~8</zKBEukbv' );
define( 'LOGGED_IN_SALT',   ' $>=2+-2Leb>v3cms=SsDg/;MkG9S*=od774|;=l,a{qHKPBD0@=xEF?FodTsB{Y' );
define( 'NONCE_SALT',       'qY6tx$@Lm x]=R4v)_<;iOP%w)e!;jk5n2UC_`1zTf^40f/k:HkH_M}lj8er{Lac' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
