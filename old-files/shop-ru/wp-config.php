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
define('DB_NAME', 'lumbershop-ru');

/** MySQL database username */
define('DB_USER', 'lumber-ru');

/** MySQL database password */
define('DB_PASSWORD', 'lumbershop4ru');

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
define('AUTH_KEY',         'u,MMX-wh/+K{]SfbJR3:COda:5SCLM^X^7wXN[I#>g/v$[8Y)0xs0kc:ggVawd>;');
define('SECURE_AUTH_KEY',  '#<K`w8jeiTij [2BF78$z^e<Q.f#e[u;s7,I&w2-Y`$gjUv-Bn+uA%#jsc~hP1 S');
define('LOGGED_IN_KEY',    'EQl?Q_3P;j/>Dx9gD-s0,182q4IGP<T#b$[++J)rl?z&&%+{*j]^7U.C[hK8fyv>');
define('NONCE_KEY',        '|V|xovgoJhTSK%`nmyi?wj>QVEAcq`;/b@s?XpvvJ!3u8:|o2bw5qoa,{<&su1ZR');
define('AUTH_SALT',        'F8vhxB6.r PsY7/B>BBsHeBq.LkgHS-<kMO7@6=o&THu!E+6<LUgie<Hc{psvp*h');
define('SECURE_AUTH_SALT', '[*Q;^N@bH[M gb1w0mg:Dr%Kk^:Mt3@YtBt$7 bxccjL]3~Z))scoI]9@ah;0lsU');
define('LOGGED_IN_SALT',   '`}NlWnT>VPFUw{fZZ*)X,<k3Yk1#g-(VX<o<8B_=4Wi$Y:9NC(sHEv@$@`T8&/L1');
define('NONCE_SALT',       'ypk%6rfr5268#fp~d[Ttr+!(SC3+m9l4iJ+mbA~~MKKf@>k8mammoa_CKdA9iHcu');

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
