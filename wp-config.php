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
define('DB_NAME', 'nsamr');

/** MySQL database username */
define('DB_USER', 'nsamr');

/** MySQL database password */
define('DB_PASSWORD', 'aZi5deSh');

/** MySQL hostname */
define('DB_HOST', 'mysql-55.int.mythic-beasts.com');

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
define('AUTH_KEY',         ':|8fMsmt8V?^LxDlS+7H:QH^Zga!8DVPVFK$WECi>BVc-%LcemgF-W0#C<+L4CAi');
define('SECURE_AUTH_KEY',  '1@eq_A]e=MpuN]%{i%]agV9Zu3;t5Y axhY5@Jox|0{/fO<axBa<qLG|/K#UCE0s');
define('LOGGED_IN_KEY',    'kT3fs:+43urh2^6D>Kda^e{gktYc/9n<TCb<q40PpCA{F+9;O3]=xb<Iu=Hq-Qx6');
define('NONCE_KEY',        'DqNSeS_!x1ta?oO5+0N#eFsclPMg`[..7UAR_EKl2t4]y*<#nd8&|rRzc:)Ht*es');
define('AUTH_SALT',        '&BarEhp;:lJ0i6e#Eh[}E6q|c(eQHYEyI28^F1Yo*4B((W`9vjEN:*7/#;_fcU*w');
define('SECURE_AUTH_SALT', '34|uB7aj2uWZ t$p;EG05+=i~8][#36z2c}}9`dj~]ZeWgx;21kp^00#yTh%W@Aq');
define('LOGGED_IN_SALT',   'Fm;[ [w6hd^xdAI1bUfc;)mfqt#2g}#Ofb[m2)_=]5?bG82[6Cn?16 C=mkYjB!6');
define('NONCE_SALT',       'ikl<Ge4=A~64G@-U39Gc_t2[9_Yia_Rxg1JR,/*[,iN:yvt0/K!V m#i}D|nBjtf');

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
