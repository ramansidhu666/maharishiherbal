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
define('DB_NAME', 'maharishiharbal');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '!nd!@123');

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
define('AUTH_KEY',         '1VU(Mc*h;yck]5q29uciut5Z<%+vORmjH5qU5pL:31[}a1^|tIyoQmH6O?}B5>$$');
define('SECURE_AUTH_KEY',  'Qn?~kg{t_,o5.tc=~-:nP?<UeQ7=`s,@?hd]dJ(9jBz9m`(]`Dbv<sepNF0AM`CD');
define('LOGGED_IN_KEY',    'BUbjxkO]$i`kDFOJgb?dxw%~!tbWxKR)IO|@9x$jK/<7?iLC^_tWMhupc^ r/6u/');
define('NONCE_KEY',        'Zva/i=@sq,]q-[9Xdl lhByhsvq>4Mxe}v@*b|6MJf&Ij]:p5Yua~RaQnS:KUTcK');
define('AUTH_SALT',        'CF-mj&[R(isl)L:Eg*#<O-dWn<EH2Y_Sl:l[iSE(Wk$o17B(MZEfOt^}LEzjgqM;');
define('SECURE_AUTH_SALT', 'jp&-l7.q~$9p5HepFx:@J[8Xm8!WJvHWt%CC!]Gl?(`7{Sru!:*SgzoZYBp9LdQa');
define('LOGGED_IN_SALT',   'm0A.J$ fZ+49;3Ihr<vIo?8e?w7O*Xj2m5Bcacq^vJz,q~IokF>aSbx5KkUXP=(-');
define('NONCE_SALT',       'GhU8_}}!z;4CdEN}TSq<e FFRJ:q[`k6l@Marlr]nGQiEO&*,Dmp$kA$k~p~OY<S');

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
