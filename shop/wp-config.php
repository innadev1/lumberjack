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
define('DB_NAME', 'lumberjack');

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
define('AUTH_KEY',         'RoV3Qe-=31$BkPq*u4dP=ZGi-k$L(nYJkc^YtU&EY)iJ*k_5{a8.imq8Ce1yDa=+');
define('SECURE_AUTH_KEY',  ':w51.([Y8gV<cNqg[c!:&*,P2iNA%pb!?AQ&LxN5}2@op.Pm#,EOZ:tl?kd^ycbO');
define('LOGGED_IN_KEY',    'w,cYDvY)WB@bpwOX~PE/%N)?zwfY^J$dt.0DIo s]FaVSu~pbM&k>ma3;uAJAa;U');
define('NONCE_KEY',        'XEy8F~SX<tNi!!huKi2AG5)7GO%+$`7#=RivG353.bUAuG`QU@#&JMlUl]=IglOH');
define('AUTH_SALT',        'X}n9!RmgSp<ZN,Ru4lg,+DPz9&DylOV3[;I_J[Jj6~G DG_+K{hXFw}[9^ebY:Vk');
define('SECURE_AUTH_SALT', 'P4/N=ktwg0S1QJe^Ybr>*37k_Gc0f4;pvL}teF*Nm|/Ysr_&Z,H@KrOpx(BypHD7');
define('LOGGED_IN_SALT',   'hwm.,I0]Q?uA.aU7;h(=v>qQ2o95@Jd0|}_}2E=0xf6rD:G5G.@aZU4w>B-Vi9#_');
define('NONCE_SALT',       'x?9<)9h~BnVf+/rdnfNO~@VsG}-tt3.<RCXg0?eCi9mEK{v,{fS;;o%e>is!J%!%');

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
