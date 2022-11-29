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
define( 'DB_NAME', 'hongtam_db' );

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
define( 'AUTH_KEY',         'd>1]JSy.peM= b%I%b9e$0&|t#(_zMOR/I$V<eDPb,_1:wuo29hq#Qvla%=m3ZXD' );
define( 'SECURE_AUTH_KEY',  'Xsee)7N~L4]$RMVH>oN04eR2;e<`P|36>7ZTP|AR-PZme{*_G~fQ1!uL>m-u.q z' );
define( 'LOGGED_IN_KEY',    'y%QKya({Wa40^<Uq+AGoUDhX4fabY65:(?Rtx#6cNsboQbJ6cL}_5XGHdu!DCf~1' );
define( 'NONCE_KEY',        'sx9J~Q7flOkJ<T{JY9Nk^R95Gy(A$)i/)&y%FUM|Aq[>Z8#bQ-*..VaF)G(q9laj' );
define( 'AUTH_SALT',        'L` p%iwnYs>*gL[Y}r;@Sqq>B#.P*h$%<2?;|(JVvcu6Z0d])a|p%8;*qGU_;sAZ' );
define( 'SECURE_AUTH_SALT', 'L#z^E-&ObJSo_t^m vD]Tx^m2RsR oE3HEs3w+;pfo#NPE2.;F;bbhzI7:k `mwG' );
define( 'LOGGED_IN_SALT',   ')=8^Sy#Aq6DMeH9hdeA%)En9sSV2F7Ufx?s~[*Zc._$XcsEo243mz}_g9V_E*5aY' );
define( 'NONCE_SALT',       'e$%Se4@F|-V4MC4s6+mNXk attqO0+gQ#V)mFK,}tM088|me f^{iQmjY^[*TNDl' );

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
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* Add any custom values between this line and the "stop editing" line. */
define( 'FS_METHOD', 'direct');


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
