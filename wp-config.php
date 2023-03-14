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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mywebsite' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '/X<uXw?z>Zu&pC?bX]VZ@tKtm4y8gCXGA*KaCoN1RJjc&-77IBw|z9Km1N|q!UD<' );
define( 'SECURE_AUTH_KEY',  '^{D!=HT.7mw:,YvGZ?r5ZAy6HED,<lFGD5qfteS[0*G13_1yC)ob2(m04bh(cay9' );
define( 'LOGGED_IN_KEY',    'cw@BUf:?Hx9>p@_xB|K@3--Hk}ESWQ<U>?SD/gGE:]@bnH;wa<=P{hC6iw7FwJ3^' );
define( 'NONCE_KEY',        '9o6G&*@P}f+J~tl{);cbLv{r,k%z9;aTKa-<sNYHmUbmP ALlFDR;3=YMj8dlKBv' );
define( 'AUTH_SALT',        'DjtduMPji}3gH</Fzc/CieHej*d:aeyQb!nck+}@NLCkSgioJ:N@AvV/2Yn<j*.G' );
define( 'SECURE_AUTH_SALT', 'lX^y^y[h+SitMaPo<4p2i&5?~&v5IV[a_FRI7Ko_f%;m6Q[qPYzSPn1iD^S?mf89' );
define( 'LOGGED_IN_SALT',   'xaqG<vuD(jlC;.PIIOnhA 4q3a4sL!d/{jZL/*pIP7^dF0BV:YhL]C5t*bCQ ^Y;' );
define( 'NONCE_SALT',       '(Euv$7r3.f5j6tF FCUtgp6t7XJ8LYB-S2P{,e@}3GL$q.UyIcZri|jq,b:WJ[7~' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
