<?php 
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL
//die();

define('WP_CACHE', true); // Added by WP Rocket

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

define( 'DB_NAME', 'glamoutlet_main_2906' );

/** MySQL database username */

define( 'DB_USER', 'root' );

/** MySQL database password */

define( 'DB_PASSWORD', '1' );

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

define( 'AUTH_KEY',         '6Si^jY@wM.L?5j<?jQ~tLCk.zq>C`Tu?^RI,6ZEm@02=-L](&_#bsL}i1HzoLh*o' );

define( 'SECURE_AUTH_KEY',  '..E _EXbi(}T[&SIVje&`qq ~GL?>+QF^o6CD#Mt[_Be,N<yDA,Srgja)wDYX~k.' );

define( 'LOGGED_IN_KEY',    'ulOy>3CE#5>TVI}SvlG&9[O.EH6WYd{EXdN-~%#tg t#$fqvD*G6l+)v0nea2.k)' );

define( 'NONCE_KEY',        'hh!U&&o,G3ra2EP|^+`e105Al|{b@Kf${.^jahBnLs89Y5iq@D#X-#V+1{sb3a.l' );

define( 'AUTH_SALT',        ']awQM]~%A:N%qwmN_Pm}IThrCC S$uIHS|AYShO9?eI]a<6@[ei@wM#.b-#S:Zb+' );

define( 'SECURE_AUTH_SALT', 'Yv lh1`hlI&W*57<fjxvCX{j+^5zDK`1Q6([I_3c[;VdYCf_SXP)ll;KUgYjX^dB' );

define( 'LOGGED_IN_SALT',   ';t;pZo*YJ6ASQgZd bylDR0Z%}0RGUGU9yJMCZ~0]n)21$))6/{]tS(wb(j5H`aP' );

define( 'NONCE_SALT',       'KI0vLyik}*gdA1>`Z!vI`=D2G3b}1k>0|7ohg$dX9uJ2<+7TkRE2o_?X_WwM][#K' );

/**#@-*/

/**

* WordPress Database Table prefix.

*

* You can have multiple installations in one database if you give each

* a unique prefix. Only numbers, letters, and underscores please!

*/

$table_prefix = 'glam_';

define('WP_SITEURL','https://' . $_SERVER['HTTP_HOST']);

define('WP_HOME','https://' . $_SERVER['HTTP_HOST']);

$LS_API_TOKEN = file_get_contents(__DIR__.'/ls_api/token.secret');

define('LS_API_URL', 'http://apitesting.dafc.com.vn:7979/api');

define('LS_API_TOKEN', $LS_API_TOKEN);

//echo LS_API_TOKEN; die();

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

define( 'WP_DEBUG', true );

define( 'WP_DEBUG_LOG', true );

define( 'WP_DEBUG_DISPLAY', true );

define( 'WP_AUTO_UPDATE_CORE', false );

//define('FS_METHOD','direct');

define( 'SCRIPT_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

define( 'ABSPATH', __DIR__ . '/' );

}

/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

