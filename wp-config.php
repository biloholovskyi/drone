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
define( 'DB_NAME', 'droneKD' );

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
define( 'AUTH_KEY',         'L,S:+J5FM6P{8e__Z4Hg3}4r}#G&X1(<+^x1/n?;N7BMa5e>~4Dl+ <y11k^t$C3' );
define( 'SECURE_AUTH_KEY',  '{mHgNFra$u5e892Av80Cn&RoI_m)@mOJYJZ73[`.KCow$I)Dp6J}<{v1Afz$2}M<' );
define( 'LOGGED_IN_KEY',    '!]D{N<RC7i}Qjq0=I}hPGUM=EzjM~dYwun^?V76S?%6HHBS[1)h8bNITmkuvnrbN' );
define( 'NONCE_KEY',        '+RH~aPA ,Wn#J;ce7Ik}LHQA`Nlhh(f,VGpteKM3;@qm,>y4E,vttg1CM0t`#%ps' );
define( 'AUTH_SALT',        '[koQo}z)V+#l-I2;Iei]9C;!qOsnc?g$5i|)<M=kS~y@zmxqb;diSgA[e) Sz9k$' );
define( 'SECURE_AUTH_SALT', ' /%k1e{if%l@({4d./EN^LW1QtD0`8`dQ]3I8k>&j^]g%Gh!ib?l&`jo8*n4}nUN' );
define( 'LOGGED_IN_SALT',   'f86bw{K?=*$2smzr_ V+YH]*+G[F>QyMDEAClg988,PMf}a&N%K43OngmqH61?:$' );
define( 'NONCE_SALT',       'EmJfuE^xJN>2D.uS8+t@u||o&UH)*uBsL}IcCDRY&wM%)sNWU!F_ftPcx|e3Fc_W' );

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
define('WP_MEMORY_LIMIT', '2000M');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
