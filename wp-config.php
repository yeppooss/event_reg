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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'events_registration' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         '[cR71r*c2U`@$P{0-,MPlw}>T;Hm~{wX*O}H1*(_Z{yf1AIwzX>_MX7wo@IMw(EC' );
define( 'SECURE_AUTH_KEY',  '`MrlC&XPjLI>,z,7@,XIjikhp]mh<*dJx4w]7f(e>Znh*gJH{ihPOok_=$?W1Sr]' );
define( 'LOGGED_IN_KEY',    'fD57+rqJi3!PR3)]m~9gDp2oY@e;$/rVN($7OBE6SN*;A`7IB})ai]i@kz#zU{=F' );
define( 'NONCE_KEY',        '|.8o4&w{SMs}f>8icF5?>ZebQg@Lx82rce{ k!@kC-9bGqovHA+0^#vnkEnY~`_h' );
define( 'AUTH_SALT',        'AFh.cvz|/_4bmwai-$i`8MX{>4IUEQydlPK{$JJ:GO.G{_t68uEYZz(1I;)x/66+' );
define( 'SECURE_AUTH_SALT', ',!yq7rOlvKt3&W=szkq~q&U#aG8u:`==!qeJFfbhiL~?r|Z^HX:Bx|$8wI>%fv23' );
define( 'LOGGED_IN_SALT',   'i_0= qZ7:8A1K]P`H8w~P6XPWQ{)8}NC3xncQ/|}Ao8`+/sS~!K]E8Pup?0pL%UH' );
define( 'NONCE_SALT',       'sg`O^ZzKH<Nl|9k_pLahKt04+n#o:gWY&`d95;)O/74oG*)o/`rf~iJXpxrC5q>C' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
