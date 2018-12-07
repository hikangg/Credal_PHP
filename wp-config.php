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
define('DB_NAME', 'credal');

/** MySQL database username */
define('DB_USER', 'credal_db');

/** MySQL database password */
define('DB_PASSWORD', 'credal_db!@1234*');

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
define('AUTH_KEY',         '+t5IfOi<MGlGHyK8JeOmprT;1OklBn5^oyLD2MUM%/vzb_4YWhuL ^Sd809vbC[z');
define('SECURE_AUTH_KEY',  'eux6t08{(OjhRUxT_Fd}qSHn-~HMj9OCgEv@5195L-$u$L%y2ln9]:i`3hiPl`yB');
define('LOGGED_IN_KEY',    'f&6R5J[kZ9F]#:}My>#=3--u`!`g).s~m#gZ/l/N y$)LR`m&4:m  S|~p o~QqT');
define('NONCE_KEY',        'YpeUM%-E[mk{WCrdphv8/Q+7VzlEEC6nhsX{!,e<9HPf|).z5CNl{|u_&E?v%TX|');
define('AUTH_SALT',        '7c2M8z8{mZ-do;F]#&J{VJ*W`.;cKLk S7q(F81pA0;  s]g<{S!kizZC-~<fO|_');
define('SECURE_AUTH_SALT', '/mszy7yDQW{2a~-UdbhC[(3c_W}{8(&kKq]}^gDi&a-U6Zhv_2U-GrhHO)Bw(A|?');
define('LOGGED_IN_SALT',   'XDd{2n1> S9L7.f,Pzcu~)ESUowYB+/Ez&=9NO{X6a^2#_nYe|fmEfkny(=6U~Cw');
define('NONCE_SALT',       'AWb@%%1#qmjL8jd<,kt.-%2;`Gi;{*H)YcFp@g9Z.o;OV_;Mhb[y&$%9<Xk%T1A4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'credal_';

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
