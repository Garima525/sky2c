<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sky2co_new');

/** MySQL database username */
//define('DB_USER', 'skytwocc_birbals');
define('DB_USER', 'sky2co_skynew');

/** MySQL database password */
//define('DB_PASSWORD', 'preBek6W');
define('DB_PASSWORD', 'J*{r4~Y&{(5{');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/* Added for disable wordpress automatic update */

define( 'AUTOMATIC_UPDATER_DISABLED', true );

define( 'WP_AUTO_UPDATE_CORE', false );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'gxqqdfltgeddvgwqo6omgie8k5mr2bovkmntk0oy01di5mk0dengfh84oditjgln');
define('SECURE_AUTH_KEY',  'dotanqgzodh4hweluxybobk5jtr1ntqxjpbcecwitdq7mr9bmbqczfyetpguoorc');
define('LOGGED_IN_KEY',    'pdjevo6ueadtjbhcyzmx1gjqwllcend3w9wy1mwwmjbx9atkughboicgt0fkc59t');
define('NONCE_KEY',        'hf1kttggve72h1rcsxuscwgyfe3okyzzwdawuhkpzei6q2fegdjw2eyndzxovi8p');
define('AUTH_SALT',        '6ellu3hbcozqsba12h90jdcpli3uw5z3xktitrj5a6dlroju9hfurbj4oboone6w');
define('SECURE_AUTH_SALT', '7t5idhdpy5gs3pzcbj7vs0wsnslfqugaashistiuw3avlebahbzjqndmv6uy1lzq');
define('LOGGED_IN_SALT',   'ytwwcoan5d6lt0yymfk1c4w66jqahdh9nb1ziwfuoa6d2kh6mkbif6ptc41dbuqw');
define('NONCE_SALT',       '5bawt80ewehwufmih8begj1qkhdgx7pn97h9hipplsr1hmhxguhnzakaud86wf6a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sy_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
