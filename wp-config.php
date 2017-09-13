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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'm1TML#ukTUZyBN1uguY{bnzRJ[T!mab`kUB,Jwx=1[r3X4MXw]$i;behbgvI{z%N');
define('SECURE_AUTH_KEY',  'Gc!5<9h`k=jDb=|fCf}Y.Q<Mm]x-12Tpwnuba_3abYiqqNumQ9U/IKCeIy1/|#OI');
define('LOGGED_IN_KEY',    'dWIwmnmZOL$A]qo=`a/=j;~bYP<Rxww4?B1KX^5H,q$%se*Hf6%1&dUU[+RJuUol');
define('NONCE_KEY',        '5[&&Ha7zCS$s8l`sour(+DfjFL5>?Qkm>p~3Z%;I@NKBzAPv<(T!>hBDl7;Q[P~~');
define('AUTH_SALT',        '  o#?CxX?sS}7b*JNRbRKAwkX7ti297]k6/{f^#3(p1c)Sh`xF_x[iTR7Hau],0J');
define('SECURE_AUTH_SALT', 'S%1-_2 Qc7NzvLafr965(i{@bGlW4[ih>)8IJF_-l^(Rh*AQG 3oyndJz5g& /Sp');
define('LOGGED_IN_SALT',   '**<<Aa.`>k<SVtjS:*p;}1zm;mg0/v|UAHc^y(][SX0g`~s&j^FMX1jS? |h[@zN');
define('NONCE_SALT',       '<Y~$.hU22ua)1;W9a./B7I_t?V[&T0kPoJBxX8MFM9VbJ5a?H>5o`m2N/)B+]6:m');

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
