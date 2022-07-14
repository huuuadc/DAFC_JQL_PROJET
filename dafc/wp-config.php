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
define( 'DB_NAME', 'dafc_test' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '1' );

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
define( 'AUTH_KEY',         ' Cw!6U9`0,qe;)jrmZj7mI~!$7e/g|)H1Pk#qJaj7hiW%7%ehx$j(NEir(),#gpv' );
define( 'SECURE_AUTH_KEY',  'lTHf(D7p%m9MD}vcaC?|fVQ>zRy}csEa>6:[Y 0N2Sf9PUlC2i{+XeUs[`4+/3pG' );
define( 'LOGGED_IN_KEY',    '7LdI*#%`_(O#3Eiy9CQw 6CGtTCzd@3;MxfI}K.<O^)<JLOSbB!%g);8IgBhY-Q^' );
define( 'NONCE_KEY',        'U<*]3=fb_pebZM%f<r{RU+!Ix|Hyob|qkY-=<%i.{l 01F[<dO6;#uQp8~QoK~6.' );
define( 'AUTH_SALT',        'xDv~:17>-{VMf Mpq|9+OPBc^U1FX;BqQ3pS(xq5b5IM~UD&a~UQ74*e2(lZb_yQ' );
define( 'SECURE_AUTH_SALT', '_7S%~Ae58zl3!E9OZzX#wu*XU@{8U_/5eg^[4i>;ile#zj[G^n[Wl]kI_3BjU:;9' );
define( 'LOGGED_IN_SALT',   '59Wd<^9L4Q!._;D`_M+ L0wTv9~Rsb^!))H8T2Si!2HgCswE:FdKeBCEL/fz*>iE' );
define( 'NONCE_SALT',       'BZ9y5}[xC62F<P&yqOAe8k[JI-giK]%:^h@F<gisr@;SB*v1/Bk&YXXMI[6^@!yA' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'dafc_';

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
