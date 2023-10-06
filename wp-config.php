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
 * 
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// define('FORCE_SSL_ADMIN', true);
// define('RELOCATE', TRUE);
// $_SERVER['HTTPS'] = 'on';
//define('WP_HOME','https://www.sky2c.com');
//define('WP_SITEURL','https://www.sky2c.com');
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sky2cdb' );

/** Database username */
define( 'DB_USER', 'sky2cdb' );

/** Database password */
define( 'DB_PASSWORD', '9i2p[qFwN-jcG.[R' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'e+ZnXh4p8Q!q1hPxMt@Mpzi:v2-|oE /W#hD[RrIP`*[Hy*5/c5n2i&zIwOMOr:%');
define('SECURE_AUTH_KEY',  '^FEr-cZ9J2sDu3.Echh9{j88Y<F[6y!lO3VWS#9Wz0D)yWy1t~S2$Z}OODY*8DJj');
define('LOGGED_IN_KEY',    '@8)ZBf$q5|a4|PkP}>dp+nY]SL:Wa|>kdCdyFgd;,)+3qMt=RYF1THmB8?ZHJ@-.');
define('NONCE_KEY',        'BepIFMM/zdCp{|T3P#c<q,a70d{9+?fzn:gYXRN+o#9`E:hr+SO&C=pG{9Z4Yz%5');
define('AUTH_SALT',        'r[6wK>/uTWWX]/P?!OYd)5W(<?E6R_lUoCVWpyTlk|CdlH_a-O0Smnj=>{+8Y5MN');
define('SECURE_AUTH_SALT', ']-a,WT2b_zwYDK~ykB2AH3ceF*a<`]_Q!OLj]f)ir:]~2Lj*i-0z+5O;y,>+Q:wV');
define('LOGGED_IN_SALT',   '1-A!pZ]dxuX11IZ{(Jqfw|!BFn1m1O6nTq1HSdW6-pXS1.:>8J}!e|ydw!g^eb+[');
define('NONCE_SALT',       '>0^{Rzloiwd2,@Zw:Me{^tcct]tVPW]Kq%6_=kws]q@A,P4Fm5y:& >p-|/vzPB1');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sy_';

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
define( 'WP_MEMORY_LIMIT', '256M' );

/* Add any custom values between this line and the "stop editing" line. */


define( 'AUTOMATIC_UPDATER_DISABLED', true );

define( 'WP_AUTO_UPDATE_CORE', false );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

