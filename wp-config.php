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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'book_store' );

/** MySQL database username */
define( 'DB_USER', 'xsoft' );

/** MySQL database password */
define( 'DB_PASSWORD', 'xsoft' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'rvMdyZok~?c.^jY,h(@RW_zNio[ a)gT,6vo/q37qP;YP<VR)i!OMf~AIgUxj`i@' );
define( 'SECURE_AUTH_KEY',  'HX`h5W$/L:z&K*zl&v;X@](.7$IH,T@j5EY7i*x+BmW/{<}u`8p0$Z4j(.@=EPd*' );
define( 'LOGGED_IN_KEY',    '6{9yp@joEL!sM>ku7B*M,~Y.fJ3}+cdwSQEw(q-f5aV7}UqQ;<[5k=^x3=IuZT2V' );
define( 'NONCE_KEY',        '`zbIG)~](w:1tmU[GH,e^^i-Y4?LS0jeH~VUi_ 37!@3O]!dK^:cB?n1ALQ+t =F' );
define( 'AUTH_SALT',        'ifJfI7J+EX)`|B~7|y]Zxgf}x_7s85ve/[v175ehaOz^5EP;$EOgb2Dn cC65R[9' );
define( 'SECURE_AUTH_SALT', ';0M2AJM{b^9AhN$j?-K02i~~&ekPMGp:0sDiSn<%1j]uxW`,4u}JY+Med-*p 6Ii' );
define( 'LOGGED_IN_SALT',   '6ZW-DAs&Z2IQd3]7nW[n`bmG^+18$|S_q#C;=/~>:AqnJL}} BnmSp6t/wKQDg`T' );
define( 'NONCE_SALT',       'BM_Y.O],Jbo8{eUvti/v]4xW%`BO};L>$<r]1fH@%yNH2]3&V]/}SC<(xX<[2|kz' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

define('FS_METHOD','direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

