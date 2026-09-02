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
* * Localized language
* * ABSPATH
*
* @link https://wordpress.org/support/article/editing-wp-config-php/
*
* @package WordPress
*/

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'glamweb_dk_db' );

/** Database username */
define( 'DB_USER', 'glamweb_dk' );

/** Database password */
define( 'DB_PASSWORD', '4B2ApGk9EtD5Rd36hHfb' );

/** Database hostname */
define( 'DB_HOST', 'mysql80.unoeuro.com:3306' );

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
define( 'AUTH_KEY', '8C{ *LB{SKh=g>+z)Vsj`;3b j=!F/7Zyu*Z3A1r>SyO437Z#,:@NF-^65|dqYbX' );
define( 'SECURE_AUTH_KEY', '3@U,K?%HM%)2KK6a<Z=-yXexHvHgbYL]oOtEnsBZEe;dId8Me%/(+>2/s]AVzxNu' );
define( 'LOGGED_IN_KEY', 'Rp a/s&o]zaR}BtD3aHtHR>Z4u3~vmH-9fgpYfd;0mG#a]Z}lbqeQ|UjVq8oo{D;' );
define( 'NONCE_KEY', 'kZ#.O1tAOh}a9Y&W`J9;,A Tx@]mTDwGHSB})ePn$!XnRa!mHP:{t+mS.piz@l49' );
define( 'AUTH_SALT', ',W;-3$PQd!RTD!W68zb*l5!2^dd6xZ7-5S1-V`Y^Rh/r^7_)*-L7sD}sN2~e.)kO' );
define( 'SECURE_AUTH_SALT', 'a/*Q,Ia-owTN1k#K]a]GRGVX3+PR<JpX4obpz{z7=Mnu0}ngk3A}sltR-#SND<4~' );
define( 'LOGGED_IN_SALT', 'gE6)T&2<n1cu9V9h$6Z}?Y)!pE8KS7*A=0b<W2h-[Rz]&xNZ.3r~XvH3Sk-)l*bk' );
define( 'NONCE_SALT', 'OB^_bF[(O}`:TGswIXeKS#I=]dQ]es&hSd,{,;Rc8{OXp~;%f|>^Ld9@`#s%Qk6@' );
define( 'WP_CACHE_KEY_SALT', '6{17N;+w|7_d[/dp!FD*BXRx,lz&jtFzDsN@NoO:ZSw%tj.Ti4QIKoBhe^%0ok*=' );


/**#@-*/

/**
* WordPress database table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
$table_prefix = 'gwp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';