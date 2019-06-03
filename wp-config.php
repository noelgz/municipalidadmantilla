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
define( 'DB_NAME', 'munimantilla' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Mt_xY9ue^@|%A5]]]bbE|8bZGr|7z}/-QxnFNK|wGuck?!#odQzVm8l~$m8Gz%%z' );
define( 'SECURE_AUTH_KEY',  'SVk$]7wh)(/4Z(Q.1>/+r7Ae9NiQY(:YB3&yFGc-b,E?G5E5FTIrI(iM+In&>Otn' );
define( 'LOGGED_IN_KEY',    'uoY@qyNp^e @o[Bb[EZ+lPv?Mwn3guu(+!((i&gF-j7t<&_{ FkCk4P-~=+#3sS-' );
define( 'NONCE_KEY',        'Nzb|XRJl)(4+B|&GK`ovtJ?f,_Z#46OlKRQrU*f8Ll16b-B>P RK(M_(x];3EI^W' );
define( 'AUTH_SALT',        'nBMkh-eGJSOej%8@&zaRo+Tr_OA+F|ba_KXPm7ag[Hb`9Wk9]N2HHhkRxau8HhU+' );
define( 'SECURE_AUTH_SALT', 'kbV}G_pYk0-HGU8*F9*X{f#|xU/)^@)r~mKI(=R:Hf@pB%@k*~lPQ+>9<:wWjU`Y' );
define( 'LOGGED_IN_SALT',   'iMR:x[eb<B1B~;xJJbnSQI^>Q,`6v2U1JW/C@lwh=ou$vD}aR?;7]w5):N1{ae]K' );
define( 'NONCE_SALT',       '>-q49w`*#>ttNCdc]/e[4&e&>mF<>VFELs `zmo3:>vbsX~EEO,/eKJ#hv/vXsPF' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
