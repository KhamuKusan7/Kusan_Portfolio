<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kusan' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '5&1 9lgO]cXw-+??FS-;)GP8m{ye[yFLzsPn@<1P[l`f>a2hje#W~c*W#r9+x=]B' );
define( 'SECURE_AUTH_KEY',  '@3] myi}SGjMnHVbI1V@j:BlbI$N~yi)~7XhZ{rk}8hCFH5>nOyzW<ZS:#e9CW*q' );
define( 'LOGGED_IN_KEY',    'HK1vo/jIJ6)`k6!mj[EmW Qq-91^>_m]+@PnUuj(.I6rhPcfgW9S-^OT$U4YiDNm' );
define( 'NONCE_KEY',        'Cei9!T5.IwgxHvEfv6F_QwKI`VU>RcFujS(LSeGeBH tSJr%If`>pGjZ$h#{s-}-' );
define( 'AUTH_SALT',        ':qQU(VsDZr5j,uw+B8SF)OI&Me~;;4n?;a4.b!WUX_&N39FN}UfV`+uL!>Xt#uf4' );
define( 'SECURE_AUTH_SALT', 'X&1N2bW7W1zi0M/MIgF!#{n-VLnp^1@yb;++zj/{/:gV^X@5r]l/~}{7hpLkG|1^' );
define( 'LOGGED_IN_SALT',   'iE=&%{#_5(s^MHjQE9c;#?EoPdz~vNgBu>C&U!JRiQ.hjKf:a4#ZT}vugODhO](d' );
define( 'NONCE_SALT',       ':1BbP%4)c&P(d&|O17P+BIjYi:hkkT_ v;.68L,+70dO[48b7x+5a-=/g.t`uNM;' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
