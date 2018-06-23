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
define('DB_NAME', 'nss');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'rootpass');

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
define('AUTH_KEY',         'rXW7i6+yIXv[g{5aDa-n7a!<gU!:osdkwWI#{]mD?v `b-D+!|51Y`$j#6TQ=Jod');
define('SECURE_AUTH_KEY',  '/oAE%1{m&~}o0`ws*$#5R8!zm^$m@ER%uq0?WURnA=SqaAy|N0uYajf/F]^<-rV.');
define('LOGGED_IN_KEY',    '.XaF}/fA ~tFctdft&W$CKZE^Cs?yN)SY>0SJ#[K;>Q+hLBp&mz1g)O51iosurn*');
define('NONCE_KEY',        '&0=gFfN.4O}&srbVE$oioGMrNbe*UPEGu}Z_@i(3ETOq{8fcV*gm9=PA9_18ig[Y');
define('AUTH_SALT',        ',5pkz44+(6}d1a*&,tqA+ZNb@F?h 4/LH)jsZ1cD/1Yd/;vBr~Vs7L#u:{]PiNLG');
define('SECURE_AUTH_SALT', '/MxSkcgbX^t#Lv!cEONTVN(V,Cext5OCo?)IJN9/r/ecu^46o&MQomR|iAn(^!fY');
define('LOGGED_IN_SALT',   '7)v6+.q1w3:ssLa~:`(X4 (OF6C`KA@nKJ5GKU]z6f^3,;rC/MPid6}:.Y1-.#z0');
define('NONCE_SALT',       '*mkfhrR:{?v1F+$gL{bFmY7sQlygLmt=^*>&E&Fex<@AHmc8E#>^!R~-vIu2[+mC');

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
